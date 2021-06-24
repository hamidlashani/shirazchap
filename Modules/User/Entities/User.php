<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class user extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'company',
        'is_superuser',
        'is_staff',
        'two_factor_type',
        'phone',
        'address',
        'cellphone',
    ];


    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }



    protected static function newFactory()
    {
        return \Modules\User\Database\factories\UserFactory::new();
    }
}
