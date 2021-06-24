<?php

namespace Modules\Article\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\Category;

class Article extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'intro',
        'text',
        'introimage',
        'textimage',
        'state',];


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
        return \Modules\Article\Database\factories\ArticleFactory::new();
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
