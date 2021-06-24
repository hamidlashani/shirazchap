<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Article\Entities\Article;
use Modules\Banners\Entities\Banner;
use Cviebrock\EloquentSluggable\Sluggable;
use Modules\Cards\Entities\Card;
use Modules\Images\Entities\Images;
use Modules\Largeformats\Entities\Largeformat;

class Category extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = [
        'user_id',
        'parent_id',
        'title',
        'slug',
        'image',
        'description',
        'type',
        'state',
    ];


    public function banners()
    {
        return $this->morphedByMany(Banner::class,'categorizable');
    }

    public function articles()
    {
        return $this->morphedByMany(Article::class,'categorizable');
    }

    public function cards()
    {
        return $this->morphedByMany(Card::class,'categorizable');
    }

    public function largeformats()
    {
        return $this->morphedByMany(Largeformat::class,'categorizable');
    }

    public function images()
    {
        return $this->morphedByMany(Images::class,'categorizable');
    }


    public function children() // child comments for this comment (?) Not sure how it's working or not
    {
        return $this->hasMany(Category::class, 'parent_id');
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
        return \Modules\Category\Database\factories\CategoryFactory::new();
    }
}
