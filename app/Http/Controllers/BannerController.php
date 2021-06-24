<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Banners\Entities\Banner;
use Modules\Category\Entities\Category;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function categories($slug)
    {

        $Banner = Category::where('slug', $slug)->first();
        return $Banner->banners;
    }

    public function banners($slug)
    {

        $banners = Category::where('slug', $slug)->first()->children;
        $url =  explode('/',urldecode(url()->current()));

        $title = mb_convert_encoding(end($url),'HTML-ENTITIES','utf-8');
        // return $title;
        $this->seo()
            ->setTitle($title);
        //->setDescription($articles->intro);

        if($banners != '[]'){
            return view('home.banners', compact('banners'));
        }

        $banners = Category::where('slug', $slug)->first()->banners;
        return view('home.banners', compact('banners'));

    }

    public function banner($slug)
    {
        $banner = Banner::where('slug', $slug)->first();
        $url =  explode('/',urldecode(url()->current()));

        $title = mb_convert_encoding(end($url),'HTML-ENTITIES','utf-8');
        // return $title;
        $this->seo()
            ->setTitle($title);
        //->setDescription($articles->intro);
        return view('home.banner', compact('banner'));
    }



}
