<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];
}
