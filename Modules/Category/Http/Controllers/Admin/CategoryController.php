<?php

namespace Modules\Category\Http\Controllers\admin;

use App\Models\state;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Entities\Category;
use Nwidart\Modules\Facades\Module;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('category::admin.all');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $modules = Module::all();

        return view('category::admin.create',compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title'=>['required'],
            'parent_id'=>'required',
            'image'=>'required',
            'description'=>'required',
            'type'=>'required',
            'state'=>'required',
        ]);

        Category::create($validate);
        return redirect(route('admin.category.index'));

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $modules = Module::all();
        $category = Category::find($id);
        $states = state::all();
        return view('category::admin.edit',compact('modules','category','states'));
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
            'title'=>['required'],
            'parent_id'=>'required',
            'image'=>'required',
            'description'=>'required',
            'type'=>'required',
            'state'=>'required',
        ]);

        $category = Category::find($id);
        $category->update($validate);
        return redirect(route('admin.category.index'));

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
