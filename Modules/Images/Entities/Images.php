<?php

namespace Modules\Images\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Article\Entities\Category;

class Images extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'path'
    ];



    public function categories()
    {
        return $this->morphToMany(Category::class,'categorizable');
    }

    public function getcategories()
    {
        $cats = array('items'=>Category::all(),'total_count'=>5,'incomplete_results'=>'true');

        //return $cats;
        return ($cats);
    }



    protected static function newFactory()
    {
        return \Modules\Images\Database\factories\ImagesFactory::new();
    }
}
