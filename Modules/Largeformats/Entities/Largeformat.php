<?php

namespace Modules\Largeformats\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\Category;
use Cviebrock\EloquentSluggable\Sluggable;

class Largeformat extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = [
        'title',
        'slug',
        'media',
        'thickness',
        'pass',
        'widths',
        // 'price',
        'image',
        'state',

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



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected static function newFactory()
    {
        return \Modules\Largeformats\Database\factories\LargeformatFactory::new();
    }
}
