<?php

namespace App\Http\Controllers;

use App\Models\Order;
use File;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Modules\Largeformats\Entities\Largeformat;
use Modules\Printingoffice\Entities\printingofficedevice;
use Modules\Printingoffice\Entities\printingofficeimages;
use Modules\Printingoffice\Entities\Printingofficepass;
use Modules\Printingoffice\Entities\printingofficeproductoption;
use Modules\Printingoffice\Entities\printingofficethickness;
use Shetabit\Multipay\Payment;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;

class OrdersController extends Controller
{
    public function addorder(Request $request)
    {
       // return $request->all();
        $refrence = app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
        $userid = auth()->user()->id ;
        $validate = $request->validate([
            'title' => 'required',
            'count' => 'required',
            'file.*' => 'required',
        ],
            [
                'file.*.required' => 'فایلی انتخاب نشده است!'
            ]);
        $validate['description']= $request->get('description');
        $validate['options']= json_encode($request->get('options' ),JSON_UNESCAPED_UNICODE);
        $validate['file']= json_encode($request->get('file'));
        $validate['punch']= $request->get('punch');
        $validate['delivery']= $request->get('delivery');
        $validate['category_type']= $request->get('model');
        $validate['product']= $request->get('product');
        $validate['size']= $request->get('width').' * '.$request->get('height');
        $validate['user_id']= $userid;





        if($request->get('model') == 'Modules\Largeformats\Entities\Largeformat') {
            $name = Largeformat::find($request->product_id);
            $device = printingofficedevice::find($request->device);
            $ticknes = printingofficethickness::find($request->thickness);
            $pass = Printingofficepass::find($request->pass);
            $fee = DB::table('printingofficeproductoptions')
                ->where('product_id', '=', $request->product_id)
                ->get();
            $fee = $fee[0]->price;

            $price = ((($request->width/100)*($request->height/100))*$fee)*$request->count;
            $validate['price'] = $price ;
            $validate['product'] = $name->title . ' ' . $device->title . ' ' . $ticknes->title . ' ' . $pass->title;
        }

        if($request->get('model') == 'Modules\Banners\Entities\Banner') {
            $validate['price'] = $request->get('price') ;
            $validate['size']= $request->get('size');
            $validate['product'] =  $request->get('product');
        }

        if($request->get('model') == 'Modules\Cards\Entities\Card') {
            $validate['price'] = $request->get('price') ;
            $validate['product'] =  $request->get('product');
        }

        $order = Order::create($validate);



if($refrence != 'banner') {


    $original = public_path('orders/original/' . $userid);
    $resized = public_path('orders/resized/' . $userid);
    //return $userfolder;
    if (!File::exists($original)) {
        File::makeDirectory($original, 0755, true, true);
    }

    if (!File::exists($resized)) {
        File::makeDirectory($resized, 0755, true, true);
    }

    foreach (json_decode($order->file) as $file) {
        File::move(public_path('uploads/' . $userid . '/' . $file), public_path('orders/original/' . $userid . '/' . $file));


        list($width, $height) = getimagesize(public_path('orders/original/' . $userid . '/' . $file));
        $original = imagecreatefromjpeg(public_path('orders/original/' . $userid . '/' . $file));
        $resized = imagecreatetruecolor(320, 200);
        imagecopyresampled($resized, $original, 0, 0, 0, 0, 320, 200, $width, $height);
        imagejpeg($resized, public_path('orders/resized/' . $userid . '/' . $file));

    }




    foreach ($request->get('file') as $file){
        $image = printingofficeimages::where('name',$file)->first();
        $image->update([
            'state'=>1
        ]);
    }

}







        return redirect()->route('showorder',$order->id);





    }

    public function delete(Request $request)
    {
        $order = Order::firstWhere('id', $request->id);
        $order->delete();

        $res=[
            'id'=>$order->id,
            'title'=>$order->title
        ];
        return $res;
    }


    public function get_card_ajax( Request $request){

        $items['items'] = DB::table('orders as a')
            ->where('a.user_id', '=', auth()->user()->id)
            ->where('a.pay_id', '=', 0)
            ->get();



        return $items;


        $res['items'][] = array(

            'id'=>'5',
            'factorId'=>'452',
            'pricePerUnit'=>'5',
            'product'=>'cart',
            'count'=>'2',
            'userPaymentAmount'=>'24000',
            'price'=>'24000',
            'isSpecial'=>'0',
            'title'=>'gagasgshs',
            'name'=>'gagasgshs',
        );

        return $items;
    }

    public function get_user_cart_ount(){
        return [
            'result'=>5
        ];
    }

    public function payment(Request $request){
        $orderid = $request->get('orderid');

        if(count($orderid) == 1 ) {
            $items = DB::table('orders as a')
                ->where('a.user_id', '=', auth()->user()->id)
                ->where('a.id', '=', $orderid)
                ->where('a.pay_id', '=', 0)
                ->sum('a.price');
            $paymentConfig = require(base_path('/config/payment.php'));
        }else{
            $items = DB::table('orders as a')
                ->where('a.user_id', '=', auth()->user()->id)
                ->where('a.pay_id', '=', 0)
                ->sum('a.price');
            $paymentConfig = require(base_path('/config/payment.php'));
        }
        $payment = new Payment($paymentConfig);


        // Retrieve json format of Redirection (in this case you can handle redirection to bank gateway)
        return $payment->config([
            'callbackUrl' => 'http://localhost:8000/card/callback?orderid='.implode('_',$orderid),
            'description' => 'پرداخت فاکتورهای شماره ' . implode(' / ',$orderid) . ' توسط : ' . auth()->user()->name
        ])->purchase(
            (new Invoice())->amount((int)$items),
            function ($driver, $transactionId) {


            }
        )->pay()->render();


    }

    public function callback(Request $request){
        $ordersinlink = $request->get('orderid');
        $orderids = explode('_',$ordersinlink);
        foreach ($orderids as $orderid){
            $orderin = Order::where('id', '=',$orderid)->firstOrFail();

            $amounts[] = $orderin->price;
            $ids[] = $orderin->id;


        }
        return $ids;
        $amount = array_sum($amounts);
        $transaction_id = $orderin->transaction_id;
        $paymentConfig = require(base_path('/config/payment.php'));
        $payment = new Payment($paymentConfig);

        try {
            $receipt = $payment->amount((int)$amount)->transactionId($transaction_id)->verify();

            // You can show payment referenceId to the user.
            $pay_id =  $receipt->getReferenceId();
            foreach ($ids as $id) {
                $orderind = orders::where('id', '=', $id)->firstOrFail();

                $orderind->update([ //updateing to myroutes table
                    'pay_id' => $pay_id,
                    'pay_date' => now(),
                ]);
            }
            return view('card.callback',[
                'success'=>$pay_id,
                'orderids'=>$orderids
            ]);

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


            return view('card.callback',['perror'=>$exception->getMessage()]);

        }






    }


    public function showorder(Request $request,$id){

        $order = Order::find($id);

//return $order;
            return view('home.showorder', compact('order'));
    }

    public function list()
    {
        $userid = Auth::user()->id;
        $orders = DB::table('orders')
            ->where('user_id', '=', $userid)
            ->where('pay_id', '!=', 0)
            ->orderBy('id', 'desc')
            ->paginate(env('PAGINATE_COUNTER'));
        return view('home.orderlist', compact('orders'));

    }



}
