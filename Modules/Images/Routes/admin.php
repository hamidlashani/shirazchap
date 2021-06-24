<?php


Route::resource('images','imagesController');
Route::post('images/uploads',[\Modules\Images\Http\Controllers\admin\ImagesController::class,'uploads'])->name('images.uploads');
