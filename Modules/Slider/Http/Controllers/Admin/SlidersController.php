<?php

namespace Modules\Slider\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Slider\Entities\Slider;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $slider = Slider::query();
        $sliders = $slider->latest()->paginate(env('PAGINATE_COUNTER'));

        return view('slider::admin.all',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('slider::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'image'=>['required'],
            'alt'=>'required',
            'url'=>'required',
            'state'=>'required',
        ]);

        Slider::create($validate);
        alert()->success('اسلایدر با موفقیت ثبت شد', 'پیام سیستم');

        return redirect(route('admin.sliders.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('slider::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Slider $slider)
    {
        return view('slider::admin.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Slider $slider)
    {
        $validate = $request->validate([
            'image'=>['required'],
            'alt'=>'required',
            'url'=>'required',
            'state'=>'required',
        ]);


        $slider->update($validate);

        alert()->success('اسلایدر با موفقیت بروزرسانی شد', 'پیام سیستم');
        return redirect(route('admin.sliders.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        return back();
    }
}