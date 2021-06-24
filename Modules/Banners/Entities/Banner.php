<?php

namespace Modules\Banners\Entities;

use App\Models\attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\Category;
use Cviebrock\EloquentSluggable\Sluggable;
class Banner extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'options',
        'prices',
        'description',
        'delivery',
        'image',
        'imagespath',
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
                'source' => 'name'
            ]
        ];
    }


    protected static function newFactory()
    {
        return \Modules\Banners\Database\factories\BannerFactory::new();
    }
}
