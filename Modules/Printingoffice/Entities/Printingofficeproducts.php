<?php

namespace Modules\Printingoffice\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\Category;

class printingofficeproducts extends Model
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

    public function category()
    {
        return $this->morphMany(Category::class,'categorizable');
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
        return \Modules\Printingoffice\Database\factories\PrintingofficeproductsFactory::new();
    }
}
