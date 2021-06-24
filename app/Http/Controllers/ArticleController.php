<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Articles;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = Articles::orderBy('id', 'DESC')->paginate(12);
        $url =  explode('/',urldecode(url()->current()));

        $title = mb_convert_encoding(end($url),'HTML-ENTITIES','utf-8');
       // return $title;
        $this->seo()
            ->setTitle($title);
            //->setDescription($articles->intro);
        return view('home.articles',compact('articles'));
    }
    public function single($slug){

        $articles = Article::where('slug', $slug)->first();

        $this->seo()
            ->setTitle($articles->title)
            ->setDescription($articles->intro);
            //->opengraph()->setUrl('http://current.url.com')
           // ->opengraph()->addProperty('type', 'articles')
           // ->twitter()->setSite('@LuizVinicius73')
           // ->jsonLd()->setType('Article');

        return view('home.article',compact('articles'));
    }
}
