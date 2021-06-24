<?php

namespace Modules\Printingoffice\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Printingofficepass extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'pass'
    ];

    protected static function newFactory()
    {
        return \Modules\Printingoffice\Database\factories\PrintingofficepassFactory::new();
    }
}
