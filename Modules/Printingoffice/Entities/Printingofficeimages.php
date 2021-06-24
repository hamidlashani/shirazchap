<?php

namespace Modules\Printingoffice\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class printingofficeimages extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'state',
    ];
    
    protected static function newFactory()
    {
        return \Modules\Printingoffice\Database\factories\PrintingofficeimagesFactory::new();
    }
}
