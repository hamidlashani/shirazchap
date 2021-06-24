<?php


use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleAuthcontroller;
use App\Http\Controllers\HomeController;

Route::resource('articles','ArticleController');
