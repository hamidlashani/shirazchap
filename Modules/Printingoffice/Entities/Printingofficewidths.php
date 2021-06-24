<?php

namespace Modules\Printingoffice\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class printingofficewidths extends Model
{
    use HasFactory;

    protected $fillable = ['size'];
    
    protected static function newFactory()
    {
        return \Modules\Printingoffice\Database\factories\PrintingofficewidthsFactory::new();
    }
}
