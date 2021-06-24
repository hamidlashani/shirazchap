<?php

namespace Modules\Printingoffice\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class printingofficemedias extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'state'
    ];

    protected static function newFactory()
    {
        return \Modules\Printingoffice\Database\factories\PrintingofficemediasFactory::new();
    }
}
