<?php

namespace Modules\Printingoffice\Http\Controllers\Admin;

use App\Models\state;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Printingoffice\Entities\printingofficedevice;
use Modules\Printingoffice\Entities\printingofficemedias;
use Modules\Printingoffice\Entities\Printingofficepass;
use Modules\Printingoffice\Entities\printingofficeproductoption;
use Modules\Printingoffice\Entities\printingofficeproducts;
use Modules\Printingoffice\Entities\printingofficethickness;

class PrintingofficeController extends Controller
{


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('printingoffice::admin.all');
    }

    public function addmedia()
    {
        return view('printingoffice::admin.addmedia');

    }



    public function allmedia()
    {
        $medias = printingofficemedias::paginate(env('PAGINATE_COUNTER'));


        return view('printingoffice::admin.allmedia',compact('medias'));

    }

    public function allproducts()
    {
       // $products = printingofficeproducts::paginate(env('PAGINATE_COUNTER'));


        $products = DB::table('printingofficeproducts')
            ->join('printingofficemedias', 'printingofficemedias.id', '=', 'printingofficeproducts.media')
           ->select('printingofficeproducts.*', 'printingofficemedias.title as media_name')
            ->paginate(env('PAGINATE_COUNTER'));

        return view('printingoffice::admin.allproducts',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('printingoffice::create');
    }



    public function storeaddmedia(Request $request)
    {

        $validate = $request->validate([
            'title'=>'required',
            'state'=>'required',
        ]);

        $allmedia = new printingofficemedias();
        $allmedia->title = $validate['title'];
        $allmedia->state = $validate['state'];
        $allmedia->save();
        return redirect(route('admin.printingoffice.allmedia'));
}

    public function mediadestroy(Request $request){
        $media = printingofficemedias::find($request->media);
        $media->delete();
        return back();
}

    public function productdestroy(Request $request){
        $product = printingofficeproducts::find($request->product);
        $product->delete();
        return back();
}

    public function mediaedite(Request $request){
        $media = printingofficemedias::find($request->media);
        return view('printingoffice::admin.mediaedite',compact('media'));
    }

    public function productedite(Request $request){


        $product = DB::table('printingofficeproducts')
            ->where('printingofficeproducts.id', '=', $request->product)
            ->get();
        $product = $product[0];

         $productoptions = DB::table('printingofficeproductoptions')
            ->where('product_id', '=', $product->id)
            ->get();






        return view('printingoffice::admin.productedite',compact('product','productoptions'));
    }


    public function updatemedia(Request $request){

        $validate = $request->validate([
            'title'=>'required',
            'state'=>'required',
        ]);

        $media = printingofficemedias::find($request->media)-> update($validate);



        return redirect(route('admin.printingoffice.allmedia'));

        return($media);
    }

    public function updateproduct(Request $request){


        $validate = $request->validate([
            'title'=>'required',
            'media'=>'required',
            'image'=>'required',
          //  'thickness'=>'required',
            //'pass'=>'required',
            'widths'=>'required',
           // 'price'=>'required',
           // 'device'=>'required',
            'state'=>'required',
        ]);

       $productin = [
           'title'=>$validate['title'],
           'media'=>$validate['media'],
           'image'=>$validate['image'],
           'widths'=>json_encode($request->widths),
           'state'=>$validate['state'],
           'slug'=>null,
       ];



if($request['oldpass']) {
    foreach ($request['oldpass'] as $key => $val) {
        $option = [
            'price' => $request['oldprice'][$key],
            'state' => $request['oldstate'][$key],
        ];
        printingofficeproductoption::find($key)->update($option);
    }
}
if($request->pass) {
    for ($i = 1; $i <= count($request->pass); $i++) {
        $device = printingofficedevice::where('id', '=', $request['device'][$i])->firstOrFail();
        $thicknesses = printingofficethickness::where('id', '=', $request['thickness'][$i])->firstOrFail();
        $pass = Printingofficepass::where('id', '=', $request['pass'][$i])->firstOrFail();

        $option = [
            'product_id' => $request->product,
            'device_id' => $device->id,
            'device_name' => $device->title,
            'thickness_id' => $thicknesses->id,
            'thickness_name' => $thicknesses->title,
            'pass_id' => $pass->id,
            'pass_name' => $pass->title,
            'price' => $request['price'][$i],
        ];

        printingofficeproductoption::create($option);


    }
}




        printingofficeproducts::find($request->product)->update($productin);

        return redirect(route('admin.printingoffice.allproducts'));

    }


    public function addproduct(){
        return view('printingoffice::admin.addproduct');
    }

public function storeaddproduct(Request $request){


    $validate = $request->validate([
        'title'=>'required',
        'media'=>'required',
        'image'=>'required',
        'widths'=>'required',
        'device'=>'required',
        'thickness'=>'required',
        'pass'=>'required',
        'price'=>'required',
        'state'=>'required',
    ]);


$product = [
    'title' =>$validate['title'],
    'widths' =>json_encode($request->widths),
    'image' =>$validate['image'],
    'media' =>$validate['media'],
    'state' =>$validate['state'],
];

$order = printingofficeproducts::create($product);





    for ($i = 1; $i <= count($validate['pass']); $i++) {

        $device = printingofficedevice::where('id', '=',$validate['device'][$i])->firstOrFail();
        $thicknesses = printingofficethickness::where('id', '=',$validate['thickness'][$i])->firstOrFail();
        $pass = Printingofficepass::where('id', '=',$validate['pass'][$i])->firstOrFail();

        $option = [
            'product_id'=>$order->id,
            'device_id'=>$device->id,
            'device_name'=>$device->title,
            'thickness_id'=>$thicknesses->id,
            'thickness_name'=>$thicknesses->title,
            'pass_id'=>$pass->id,
            'pass_name'=>$pass->title,
            'price'=>$validate['price'][$i],
        ];

        printingofficeproductoption::create($option);


    }




//foreach ($thicknesses
// as $thickness) {
    //   if ($validate['pri
    //ce'][$thickness->id] != null) {
    //       $options[] = array($thickness->id,
    // $validate['thickness'][$thickness->id], $validate['price'][$thickness->id]);










    //medal,citizen,ribbon,fiber,saddle,fresh,public,armed,word,dash,december,wage



























    //cabin uncover history film someone pulp tail universe wash need evolve busy
    //old twist weather save deposit else height riot biology calm bring jelly   }



   // $validate['thickness'] = json_encode($options,JSON_UNESCAPED_UNICODE );
 //   $validate['pass'] = 1;










return back();
}



}
