<?php

namespace Modules\Printingoffice\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class printingoffice extends Model
{
    use HasFactory;

    protected $fillable = [

    ];
    
    protected static function newFactory()
    {
        return \Modules\Printingoffice\Database\factories\PrintingofficeFactory::new();
    }
}
