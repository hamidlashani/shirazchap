<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class printingofficelargeformatorder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'title',
        'media_id',
        'productoptions_id',
        'product_id',
        'device_id'  ,
        'device_name' ,
        'thickness',
        'thickness_name',
        'height',
        'width',
        'pass_id',
        'pass_name',
        'count',
        'description',
        'image',
        'additions',
        'price',
        'transaction_id',
        'pay_id',
        'pay_date',

    ];
}
