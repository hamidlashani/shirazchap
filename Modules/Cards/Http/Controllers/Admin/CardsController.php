<?php

namespace Modules\Cards\Http\Controllers\admin;

use App\Models\state;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Cards\Entities\Card;
use Modules\Category\Entities\Category;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $cards = Card::query();
        $cards =  $cards->latest()->paginate(env('PAGINATE_COUNTER'));

        return view('cards::admin.all',compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $card = Card::first();
        $states = state::all();
        $cats =  DB::table('categories')->where('type',get_class($card))->get();

        return view('cards::admin.create',compact('cats','states'));
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

        $card = Card::create($product);

        $card->categories()->sync($request->get('category'));


        alert()->success('محصول با موفقیت بروزرسانی شد', 'پیام سیستم');

        return redirect(route('admin.cards.index'));

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('cards::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Card $card)
    {
        $states =state::all();
        $cats =  DB::table('categories')->where('type',get_class($card))->get();


        return view('cards::admin.edit',compact(['card','cats','states']));
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

        for ($i = 1 ;$i <= count($request->get('files')) ; $i++ ){

            $files[] = array(
                'text'=> $request->get('files')[$i - 1],
                'filestate'=>$request->get('filestate')[$i - 1],
            );

        }


        $product = [
            'name' =>$validate['name'],
            'width' =>$validate['width'],
            'height' =>$validate['height'],
            'circulation' =>$validate['circulation'],
            'description' =>$validate['description'],
            'dayprises' =>json_encode($days),
            'files' =>json_encode($files),
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

        $card = Card::find($id);
        $card->update($product);

        $card->categories()->sync($request->get('category'));


        $cards = Card::query()->latest()->paginate(env('PAGINATE_COUNTER'));
        alert()->success('محصول با موفقیت بروزرسانی شد', 'پیام سیستم');

        return redirect(route('admin.cards.index'));


    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $card = Card::find($id);
        $card->categories()->detach();
        $card->delete();

        return back();
    }
}
