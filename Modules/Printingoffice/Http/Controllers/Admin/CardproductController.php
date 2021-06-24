<?php

namespace Modules\Printingoffice\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Printingoffice\Entities\Cardproduct;

class CardproductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function all()
    {
        $products = cardproduct::paginate(env('PAGINATE_COUNTER'));

        return view('printingoffice::admin.cardprocuct.all',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('printingoffice::admin.cardprocuct.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'=>'required',
            'width'=>'required',
            'height'=>'required',
            'circulation'=>'required',
            'description'=>'',
            'image'=>'required',
            'state'=>'required',
            'side'=>'required',
            'category'=>'required',
        ]);


        for ($i = 1 ;$i <= count($request->days) ; $i++ ){

            $days[] = array(
               'day'=>$request->days[$i - 1],
               'price'=>$request->price[$i - 1],
               'daystate'=>$request->daystate[$i - 1],
            );

        }


        $product = [
            'name' =>$validate['name'],
            'width' =>$validate['width'],
            'height' =>$validate['height'],
            'circulation' =>$validate['circulation'],
            'description' =>$validate['description'],
            'dayprises' =>json_encode($days),
            'image' =>$validate['image'],
            'side' =>$validate['side'],
            'state' =>$validate['state'],
            //'category' =>$validate['category'],
        ];

        if($request->lat){
            $product['lat'] = $request->lat;
        }
        if($request->khateta){
            $product['khateta'] = $request->khateta;
        }
        if($request->ghaleb){
            $product['ghaleb'] = $request->ghaleb;
        }

        $product['user_id']= Auth::user()->id;
        $cardproduct = cardproduct::create($product);

        $cardproduct->categories()->sync($validate['category']);


        return redirect(route('admin.cardprocuct.all'));


    }



    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request)
    {

        $cardproduct = cardproduct::where('id', $request->product)->first();
        return view('printingoffice::admin.cardprocuct.edit',compact('cardproduct'));

    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        $validateDate = $request->validate([
            'title'=>'required',
            'width'=>'required',
            'height'=>'required',
            'circulation'=>'required',
            'description'=>'',
            'price'=>'required',
            'image'=>'required',
            'state'=>'required',
            'side'=>'required',
        ]);

        $validateDate['slug'] = null;
        $cardproduct = cardproduct::find($request->id)->update($validateDate);
        return redirect(route('admin.cardprocuct.all'));


    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {
        $cardproduct = cardproduct::find($request->id);
        $cardproduct->delete();
        return back();

    }
}
