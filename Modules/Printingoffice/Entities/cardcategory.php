<?php

namespace Modules\Printingoffice\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cardcategory extends Model
{
    use HasFactory;

    protected $fillable = ['name','parent'];

    public function child(){
        return $this->hasMany(cardcategory::class,'parent', 'id');
    }

    public function products(){
        return $this->belongsToMany(cardproduct::class);
    }


    protected static function newFactory()
    {
        return \Modules\Printingoffice\Database\factories\CategoryFactory::new();
    }
}
