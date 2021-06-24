<?php

namespace Modules\Printingoffice\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class printingofficeproductoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'device_id',
        'device_name',
        'thickness_id',
        'thickness_name',
        'pass_id',
        'pass_name',
        'price',
        'state'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Printingoffice\Database\factories\PrintingofficeproductoptionFactory::new();
    }
}
