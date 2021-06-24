<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Article\Entities\Category;

class ImagesController extends Controller
{
    public function getcategoryimages(Request $request){

        $images_category = DB::table('categorizables')->where('category_id',$request->id)->get();

        if($images_category != '[]') {
            foreach ($images_category as $image) {
                $images[] = DB::table('images')->where('id', $image->categorizable_id)->first();
            }
            return $images;
        }else{
            return 'no image';
        }
    }
}
