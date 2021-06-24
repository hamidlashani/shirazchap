<?php

namespace Modules\Printingoffice\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class printingofficethickness extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    
    protected static function newFactory()
    {
        return \Modules\Printingoffice\Database\factories\PrintingofficethicknessFactory::new();
    }
}
