<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Largeformats extends Model
{
    use HasFactory,Notifiable,Sluggable;

 protected $fillable = [
    'title',
    'slug',
    'media',
    'thickness',
    'widths',
    'price',
    'image',
    'state',
];
protected $table = 'printingofficeproducts';
    public function sluggable(): array
{
    return [
        'slug' => [
            'source' => 'title'
        ]
    ];
}
}
