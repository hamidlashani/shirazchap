<?php


Route::resource('banners','BannerController');
Route::post('uploads',[\Modules\Banners\Http\Controllers\Admin\BannerController::class,'uploads'])->name('uploads');
