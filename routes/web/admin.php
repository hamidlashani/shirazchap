<?php


use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleAuthcontroller;
use App\Http\Controllers\HomeController;
use Modules\Banners\Http\Controllers\Admin\BannerController;

Route::get('/','AdminController@index')->name('adminIndex');

Route::resource('users','UserController');

