<?php

namespace App\Http\Controllers;

use App\Models\Largeformats;
use App\Models\printingofficelargeformatorder;
use App\Models\printingofficeproductoption;
use App\Notifications\PrintingOfficeSms;
use Ghasedak\GhasedakApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Modules\Largeformats\Entities\Largeformat;
use Modules\Printingoffice\Entities\Printingofficeimages;
use Modules\Printingoffice\Entities\Printingofficeproducts;
//use Modules\Printingoffice\Entities\printingofficeproductoption;
use Modules\Printingoffice\Entities\printingofficethickness;
use Modules\Printingoffice\Entities\printingofficewidths;
use Modules\User\Entities\user;
use Validator;
use File;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Payment;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Illuminate\Support\Facades\Cache;

class PrintingofficeController extends Controller
{
    public function largeformats()
    {

        $url =  explode('/',urldecode(url()->current()));

        $title = mb_convert_encoding(end($url),'HTML-ENTITIES','utf-8');
        // return $title;
        $this->seo()
            ->setTitle($title);
        //->setDescription($articles->intro);
       $largeformats = Largeformat::latest()->paginate(12);


        $largeformats = DB::table('largeformats')
            ->where('largeformats.state', '=',1)

             ->join('printingofficeproductoptions', 'largeformats.id', '=', 'printingofficeproductoptions.product_id')
          ////  ->join('printingofficethicknesses', 'largeformats.thickness', '=', 'printingofficethicknesses.id')
            ->select('largeformats.*','printingofficeproductoptions.price')
           ->groupBy('media')
           ->orderBy('largeformats.id','asc')
           ->paginate(env('PAGINATE_COUNTER'));



//return $largeformats;
        return view('home.largeformats', compact('largeformats'));
    }

    public function largeformat($slug)
    {

        $url =  explode('/',urldecode(url()->current()));

        $title = mb_convert_encoding(end($url),'HTML-ENTITIES','utf-8');
        // return $title;
        $this->seo()
            ->setTitle($title);
        //->setDescription($articles->intro);


        $product = Largeformat::firstWhere('slug', $slug);

        $options = printingofficeproductoption::where('product_id', '=',$product->id)
            ->where('state', '=',1)
            ->get();

       return view('home.largeformat', compact('product','options'));
    }


   
       public function uploadfile(Request $request)
    {

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,jpg',
        ]);



                $userid = $request->user()->id;
                $name=rand(1111,9999).time().'.'.$request->file->getClientOriginalExtension();
                $request->file->move(public_path('uploads/'.$userid), $name);


$infile = public_path('uploads/'.$userid).'/'.$name;
        $outFile = public_path('uploads/'.$userid);
        $filetype = explode( ".", $infile);
		$filetype = end( $filetype );
		/*if($filetype == 'tif'){
			$image = new \Imagick($inFile);
			$image->thumbnailImage( 250, 200 );
			$image->writeImage($outFile .'/thumb_'.$name.'.jpg');
			
			
		}else{
			
		$image = new \Imagick($infile);
		$image->thumbnailImage( 250, 200 );
		$image->writeImage( $outFile.'/thumb_'.$name );
			
		}


*/


                $images = [
                    'name'=>$name,
                    'user_id'=>$userid
                ];
                 $a = printingofficeimages::create($images);
                return $name;
       




    }



       public function avatar(Request $request)
    {




                $userid = $request->user()->id;
                $name=$userid.'.'.$request->file->getClientOriginalExtension();
                $request->file->move(public_path('avatars/'), $name);




                 \App\Models\User::find($userid)->update([
                     'avatar'=>$name
                 ]);
                return $name;





    }



    public function uploadfile2(Request $request)
    {

        $userid = $request->user()->id;

        $input=$request->all();
        $images=array();
        if($files=$request->file('images')){

            foreach($files as $file){
                $name=rand(1111,9999).time().'.'.$file->getClientOriginalExtension();

                $file->move(public_path('uploads/'.$userid),$name);
                $images[]=$name;

        $infile = public_path('uploads/'.$userid).'/'.$name;
        $outFile = public_path('uploads/'.$userid);
        $filetype = explode( ".", $infile);

	/*	$filetype = end( $filetype );
		if($filetype == 'tif'){
			$image = new \Imagick($inFile);
			$image->thumbnailImage( 250, 200 );
			$image->writeImage($outFile .'/thumb_'.$name.'.jpg');
			
			
		}else{
			
		$image = new \Imagick($infile);
		$image->thumbnailImage( 250, 200 );
		$image->writeImage( $outFile.'/thumb_'.$name );
			
		}

*/





                $image = [
                    'name'=>$name,
                    'user_id'=>$userid
                ];
                $images = printingofficeimages::create($image);

            }
        }
return json_encode('ok');

    }

    public function addlforder(Request $request)
    {
        // return $request;
        $validate = $request->validate([
            'title' => 'required',
            'product_id' => 'required',
            'media_id' => 'required',
            'thickness' => 'required',
            'device' => 'required',
            'height' => 'required',
            'width' => 'required',
            'count' => 'required',
            'pass' => 'required',
            'description' => '',
            'user_id' => '',
            'price' => '',
            'image' => 'required',
        ]);


        $options = printingofficeproductoption::where('product_id', '=', $validate['product_id'])
            ->where('thickness_id', '=', $validate['thickness'])
            ->where('pass_id', '=', $validate['pass'])
            ->firstOrFail();


        $width = printingofficewidths::where('id', '=', $validate['width'])->firstOrFail();


        $price = ($validate['height'] / 100 * $width->size / 100 * $options->price) * $validate['count'];
        $Additions = [];
        if ($request->has('punch')) {
            $punch = $request->get('punch');
            if ($punch[0] == 1) {
                $countpunch = $request->get('punchcount');
                $punchprice_base = 500;
                $punchprice = $countpunch * $punchprice_base;
                $price = $price + $punchprice;
                array_push($Additions,['countpunch'=>$countpunch]);

            }
        }


        if ($request->has('lifeh')) {
            $lifeh = $request->get('lifeh');
            if(($lifeh[0] == 'tree') || ($lifeh[0] == 'darbasti')){
                $lifehsides = $request->get('lifehside');


                $lifehmeter = [];

                if(in_array('up',$lifehsides)){
                    array_push($lifehmeter,$width->size);
                }
                if(in_array('down',$lifehsides)){
                    array_push($lifehmeter,$width->size);
                }
                if(in_array('left',$lifehsides)){
                    array_push($lifehmeter,$validate['height']);
                }
                if(in_array('right',$lifehsides)){
                    array_push($lifehmeter,$validate['height']);
                }



                array_push($Additions,[
                    'lifehtype'=>$lifeh[0],
                    'lifehside'=>$lifehsides,
                    'lifehmeter'=>array_sum($lifehmeter),
                ]);

            }
            $lifehprice_baee = 1000;

            $price = $price+($lifehprice_baee*(array_sum($lifehmeter)/100));
        }

    $Additions = json_encode($Additions);
    $userid = auth()->user()->id ;

    $ordervalues = [
    'order_id' => Str::random(10),
    'user_id' => $userid,
    'title' => $validate['title'],
    'media_id' => $validate['media_id'],
    'productoptions_id' => $options['id'],
    'product_id' => $options['product_id'],
    'device_id' => $options['device_id'],
    'device_name' => $options['device_name'],
    'thickness' => $validate['thickness'],
    'thickness_name' => $options['thickness_name'],
    'height' => $validate['height'],
    'width' => $validate['width'],
    'pass_id' => $validate['pass'],
    'pass_name' => $options['pass_name'],
    'count' => $validate['count'],
    'description' => $validate['description'],
    'image' => $validate['image'],
    'price' => $price,
    'additions' => $Additions,
    ];

    $order = printingofficelargeformatorder::create($ordervalues);
    $original = public_path('orders/original/'.$userid);
    $resized = public_path('orders/resized/'.$userid);
    //return $userfolder;
        if(!File::exists($original)) {
            File::makeDirectory($original, 0755, true, true);
        }

        if(!File::exists($resized)) {
            File::makeDirectory($resized, 0755, true, true);
        }
        File::move(public_path('uploads/'.$userid.'/'.$order->image),public_path('orders/original/'.$userid.'/'.$order->image) );


       list($width, $height) = getimagesize(public_path('orders/original/'.$userid.'/'.$order->image));
        $original = imagecreatefromjpeg(public_path('orders/original/'.$userid.'/'.$order->image));
       $resized = imagecreatetruecolor(320, 200);
        imagecopyresampled($resized, $original, 0, 0, 0, 0, 320, 200, $width, $height);
        imagejpeg($resized, public_path('orders/resized/'.$userid.'/'.$order->image));


        $imgin = printingofficeimages::where('name', '=',$order->image)->firstOrFail();

        $imgin->update(['state'=>1]);


        $request->user()->notify(new PrintingOfficeSms([
            'text'=>"فاکتور شماره {$order->id} با موفقیت ثبت  گردید.  مجتمع بزرگ شیراز چاپ"
       ] ));

        return redirect(route('showlargeformatorder',$order->order_id));
    }

    public function showlargeformatorder(Request $request ,$order){

       // $showorder = printingofficelargeformatorder::find($order);


        $showorders = DB::table('printingofficelargeformatorders')
            ->where('printingofficelargeformatorders.order_id', '=', $order)
            ->join('printingofficewidths', 'printingofficelargeformatorders.width', '=', 'printingofficewidths.id')
            ->join('printingofficeproductoptions', 'printingofficeproductoptions.id', '=', 'printingofficelargeformatorders.productoptions_id')
            ->join('printingofficemedias', 'printingofficemedias.id', '=', 'printingofficelargeformatorders.media_id')
            ->select('printingofficelargeformatorders.*','printingofficeproductoptions.*',  'printingofficewidths.size as width',  'printingofficemedias.title as media_name',  'printingofficelargeformatorders.price as price')
            ->get();

    $showorder = $showorders[0];

        if(Gate::allows('user-access',$showorder->user_id)) {

            return view('home.showlargeformatorder', compact('showorder'));
        }
        abort(403,'متاسفانه شما به این لینک دسترسی ندارید.');
    }

    public function paymet($order){

        $orderin = printingofficelargeformatorder::where('order_id', '=',$order)->firstOrFail();
        if(! $orderin->pay_id) {
    // load the config file from your project
            $paymentConfig = require(base_path('/config/payment.php'));

            $payment = new Payment($paymentConfig);


    // Retrieve json format of Redirection (in this case you can handle redirection to bank gateway)
            return $payment->config([
                'callbackUrl' => 'http://localhost:8000/payment/callback?orderid=' . $order,
                'description' => 'پرداخت فاکتور شماره ' . $order . ' توسط : ' . auth()->user()->name
            ])->purchase(
                (new Invoice)->amount((int)$orderin->price),
                function ($driver, $transactionId) {


                }
            )->pay()->render();
        }else{
            abort(403,'فاکتور مورد نظر شما پرداخت شده است',[

            ]);
        }
    }

    public function callback(Request $request){


    $orderin = printingofficelargeformatorder::where('order_id', '=',$request->orderid)->firstOrFail();

    $transaction_id = $orderin->transaction_id;


    // load the config file from your project
    $paymentConfig = require(base_path('/config/payment.php'));

    $payment = new Payment($paymentConfig);


    // You need to verify the payment to ensure the invoice has been paid successfully.
    // We use transaction id to verify payments
    // It is a good practice to add invoice amount as well.
    try {
        $receipt = $payment->amount((int)$orderin->price)->transactionId($transaction_id)->verify();

        // You can show payment referenceId to the user.
        $pay_id =  $receipt->getReferenceId();

        $orderin->update([ //updateing to myroutes table
            'pay_id' => $pay_id,
            'pay_date' => now(),
        ]);
        return view('home.callback',['success'=>$pay_id]);

    } catch (InvalidPaymentException $exception) {
        /**
        when payment is not verified, it will throw an exception.
        We can catch the exception to handle invalid payments.
        getMessage method, returns a suitable message that can be used in user interface.
         **/
        $paymenterror=[
            'perror'=>$exception->getMessage()
        ];
    //    return view('home.callback',['success'=>24525,'orderid'=>123]);

        return view('home.callback',['perror'=>$exception->getMessage()]);

    }



    }

    public function ajax(Request $request){
    $deviceid = $request->input('deviceid');
    $thicknessid = $request->input('thicknessid');
    $productid = $request->input('productid');
    $passid = $request->input('passid');

    if(($deviceid) && ($productid)){
        $res = printingofficeproductoption::where('product_id', '=', $productid)
            ->where('device_id', '=', $deviceid)
            ->groupBy('thickness_id')
            ->get();
    }
    if(($deviceid) && ($thicknessid) && ($productid)){
        $res = printingofficeproductoption::where('product_id', '=', $productid)
            ->where('device_id', '=', $deviceid)
            ->where('thickness_id', '=', $thicknessid)
            ->groupBy('pass_id')
            ->get();
    }
    if(($deviceid) && ($thicknessid) && ($productid)&& ($passid)){
        $res = printingofficeproductoption::where('product_id', '=', $productid)
            ->where('device_id', '=', $deviceid)
            ->where('thickness_id', '=', $thicknessid)
            ->where('pass_id', '=', $passid)
            ->firstOrFail() ;
    }





    return ($res);


    }

    public function uploadimage( Request $request){
        
        
        
        Cache::flush();
        
        
        
        $userid = $request->user()->id;

        $images = DB::table('printingofficeimages')
            ->where('user_id', '=', 3)
            ->where('state', '=', 0)
            ->get('name');

        if($images != '[]') {

            foreach ($images as $img) {

                $imgs[] = 'uploads/' . $userid . '/thumb_' . $img->name;
                $urls[] = '{size:"' . filesize('uploads/' . $userid . '/' . $img->name) . '",caption:"</br>' . $img->name . '",url:"' . route('imagedelete', ['id' => $img->name]) . '",key: 1}';

            }

            $resimages = json_encode($imgs);
            return view('home.uploadimage',compact('resimages','urls'));

        }else{
            $resimages = json_encode(1);
            $urls = json_encode(1);

            return view('home.uploadimage',compact('resimages','urls'));
        }
    }

    public function imagedelete(Request $request){
        $id = $request->id;

        $images = printingofficeimages::firstWhere('name', $id);

        $srcimage = public_path('uploads/'.$images->user_id.'/'.$images->name);
        $srcimagethumb = public_path('uploads/'.$images->user_id.'/thumb_'.$images->name);
        unlink($srcimage);
        unlink($srcimagethumb);
        $images->delete();
        return json_encode('hhhhh00');
    }
}
