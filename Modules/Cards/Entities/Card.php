<?php

namespace Modules\Cards\Entities;

use App\Models\attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Category\Entities\Category;
use Cviebrock\EloquentSluggable\Sluggable;
class Card extends Model
{
    use HasFactory,Sluggable;

    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'width',
        'height',
        'side',
        'lat',
        'khateta',
        'ghaleb',
        'circulation',
        'description',
        'dayprises',
        'files',
        'image',
        'view_count',
        'state'
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
        return \Modules\Cards\Database\factories\CardFactory::new();
    }
}
