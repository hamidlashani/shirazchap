<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Articles extends Model
{
    use HasFactory,Notifiable,Sluggable;
    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'slug',
        'intro',
        'text',
        'introimage',
        'textimage',
        'state',
    ];



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
