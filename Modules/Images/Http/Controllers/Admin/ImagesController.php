<?php

namespace Modules\Images\Http\Controllers\admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Images\Entities\Images;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $images = Images::query()->latest()->paginate(env('PAGINATE_COUNTER'));

        return view('images::admin.all',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $image = Images::first();
        $cats =  DB::table('categories')
            ->where([
                ['type',get_class($image)],
                ['parent_id','!=',0],
            ])
            ->get();

        return view('images::admin.create',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'category'=>'required',
        ]);
        $files = $request->file('files');
        $images=array();


            foreach($files as $file) {
                $filename =$validate['category'] . rand(111111, 999999) ;
                $name = $filename . '.' . $file->getClientOriginalExtension();
                $path = '/images/banners/'.$validate['category'].'/'.$name;
                $file->move(public_path('images/banners/' . $validate['category']), $name);
                $images[] = $name;
                $image = [
                    'name' => $filename,
                    'path' => $path
                ];
               // return $image;

                $imaged = Images::create($image);
                $imaged->categories()->sync($request->get('category'));

            }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('images::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('images::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
