<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Modules\Category\Entities\Category;
use Illuminate\Http\Request;
use Modules\Cards\Entities\Card;

class cardController extends Controller
{
    public function categories()
    {
        $url =  explode('/',urldecode(url()->current()));

        $title = mb_convert_encoding(end($url),'HTML-ENTITIES','utf-8');
        // return $title;
        $this->seo()
            ->setTitle($title);
        //->setDescription($articles->intro);
        $cards = Category::
            where('type', 'Modules\Cards\Entities\Card')
            ->where('parent_id', 0)
            ->get();
        return view('home.cards_category', compact('cards'));
    }

    public function cards($slug)
    {

        $url =  explode('/',urldecode(url()->current()));

        $title = mb_convert_encoding(end($url),'HTML-ENTITIES','utf-8');
        // return $title;
        $this->seo()
            ->setTitle($title);
        //->setDescription($articles->intro);
        $cards = Category::where('slug', $slug)->first()->children;

        if($cards != '[]'){
            return view('home.cards', compact('cards'));
        }

        $cards = Category::where('slug', $slug)->first()->cards;
        return view('home.cards', compact('cards','slug'));

    }

    public function card($slug)
    {
        $url =  explode('/',urldecode(url()->current()));

        $title = mb_convert_encoding(end($url),'HTML-ENTITIES','utf-8');
        // return $title;
        $this->seo()
            ->setTitle($title);
        //->setDescription($articles->intro);
        $card = Card::where('slug', $slug)->first();
        return view('home.card', compact('card'));
    }


}
