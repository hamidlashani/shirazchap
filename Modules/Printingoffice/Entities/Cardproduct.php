<?php

namespace Modules\Printingoffice\Entities;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cardproduct extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = [
                            'user_id',
                            'title',
                            'slug',
                            'width',
                            'height',
                            'side',
                            'circulation',
                            'description',
                            'dayprises',
                            'image',
                            'view_count',
                            'state',
                            'lat',
                            'khateta',
                            'ghaleb',
                          ];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }



    public function categories(){
        return $this->belongsToMany(cardcategory::class);
    }






    protected static function newFactory()
    {
        return \Modules\Printingoffice\Database\factories\CardproductFactory::new();
    }
}
