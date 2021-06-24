<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Modules\Category\Entities\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
public function index()
{
    $machins = Category::where('slug', 'ماشین-آلات')->first()->articles;
    return view('layouts.app',compact('machins'));

}

    public function terms()
    {
        $url =  explode('/',urldecode(url()->current()));

        $title = mb_convert_encoding(end($url),'HTML-ENTITIES','utf-8');
        // return $title;
        $this->seo()
            ->setTitle($title);
        //->setDescription($articles->intro);


        return view('home.terms');
    }
}
