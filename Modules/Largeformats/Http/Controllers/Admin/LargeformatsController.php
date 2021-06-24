<?php

namespace Modules\Largeformats\Http\Controllers\admin;

use App\Models\state;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Largeformats\Entities\Largeformat;
use Modules\Printingoffice\Entities\printingofficedevice;
use Modules\Printingoffice\Entities\Printingofficepass;
use Modules\Printingoffice\Entities\printingofficeproductoption;
use Modules\Printingoffice\Entities\printingofficethickness;

class LargeformatsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $largeformats = Largeformat::query()->latest()->paginate(env('PAGINATE_COUNTER'));
        $cats =  DB::table('categories')->where('type',get_class($largeformats))->get();

        return view('largeformats::admin.all',compact('largeformats','cats'));
    }


    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Largeformat $largeformat)
    {
        $states = state::all();
        $cats =  DB::table('categories')->where('type',get_class($largeformat))->get();
        return view('largeformats::admin.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
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

        $largeformat = Largeformat::create($product);
        $largeformat->categories()->sync($request->get('category'));

        if($request->pass) {
            for ($i = 1; $i <= count($request->pass); $i++) {
                $device = printingofficedevice::where('id', '=', $request['device'][$i])->firstOrFail();
                $thicknesses = printingofficethickness::where('id', '=', $request['thickness'][$i])->firstOrFail();
                $pass = Printingofficepass::where('id', '=', $request['pass'][$i])->firstOrFail();

                $option = [
                    'product_id' => $largeformat->id,
                    'device_id' => $device->id,
                    'device_name' => $device->title,
                    'thickness_id' => $thicknesses->id,
                    'thickness_name' => $thicknesses->title,
                    'pass_id' => $pass->id,
                    'pass_name' => $pass->title,
                    'price' => $request['price'][$i],
                ];

                printingofficeproductoption ::create($option);


            }
        }


        return redirect(route('admin.largeformats.index'));

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('largeformats::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Largeformat $largeformat)
    {

        $states = state::all();
        $cats =  DB::table('categories')->where('type',get_class($largeformat))->get();
        $productoptions = DB::table('printingofficeproductoptions')
            ->where('product_id', '=', $largeformat->id)
            ->get();

        return view('largeformats::admin.edit',compact(['largeformat','cats','states','productoptions']));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {

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
                    'product_id' => $id,
                    'device_id' => $device->id,
                    'device_name' => $device->title,
                    'thickness_id' => $thicknesses->id,
                    'thickness_name' => $thicknesses->title,
                    'pass_id' => $pass->id,
                    'pass_name' => $pass->title,
                    'price' => $request['price'][$i],
                ];

                printingofficeproductoption ::create($option);


            }
        }



        $largeformat = Largeformat::find($id);
        $largeformat->update($productin);
        $largeformat->categories()->sync($request->get('category'));

        return redirect(route('admin.largeformats.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
