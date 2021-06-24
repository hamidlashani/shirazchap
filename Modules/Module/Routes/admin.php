<?php


use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleAuthcontroller;
use App\Http\Controllers\HomeController;

Route::get('modules','ModuleController@index')->name('modules.index');
Route::patch('modules/{module}/disable','ModuleController@disable')->name('modules.disable');
Route::patch('modules/{module}/enable','ModuleController@enable')->name('modules.enable');
