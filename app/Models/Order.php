<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'category_type',
        'user_id',
        'title',
        'product',
        'size',
        'count',
        'file',
        'options',
        'description',
        'price',
        'pay_id',
        'pay_date',
    ];
}
