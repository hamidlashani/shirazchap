<?php
use \Modules\Printingoffice\Http\Controllers\Admin\PrintingofficeController;

Route::get('/printingoffice/addmedia', 'PrintingofficeController@addmedia')->name('printingoffice.addmedia');
Route::post('/printingoffice/addmedia', 'PrintingofficeController@storeaddmedia')->name('printingoffice.storeaddmedia');
Route::get('/printingoffice/allmedia', 'PrintingofficeController@allmedia')->name('printingoffice.allmedia');
Route::delete('/printingoffice/mediadestroy','PrintingofficeController@mediadestroy')->name('printingoffice.mediadestroy');
Route::get('/printingoffice/mediaedite','PrintingofficeController@mediaedite')->name('printingoffice.mediaedite');
Route::patch('/printingoffice/updatemedia','PrintingofficeController@updatemedia')->name('printingoffice.updatemedia');

Route::get('/printingoffice/allproducts', 'PrintingofficeController@allproducts')->name('printingoffice.allproducts');
Route::get('/printingoffice/addproduct', 'PrintingofficeController@addproduct')->name('printingoffice.addproduct');
Route::post('/printingoffice/storeaddproduct','PrintingofficeController@storeaddproduct')->name('printingoffice.storeaddproduct');
Route::delete('/printingoffice/productdestroy','PrintingofficeController@productdestroy')->name('printingoffice.productdestroy');
Route::get('/printingoffice/productedite','PrintingofficeController@productedite')->name('printingoffice.productedite');
Route::patch('/printingoffice/updateproduct','PrintingofficeController@updateproduct')->name('printingoffice.updateproduct');


Route::get('/cardprocuct/all', 'CardproductController@all')->name('cardprocuct.all');
Route::get('/cardprocuct/create', 'CardproductController@create')->name('cardprocuct.create');
Route::post('/cardprocuct/store','CardproductController@store')->name('cardprocuct.store');
Route::delete('/cardprocuct/destroy','CardproductController@destroy')->name('cardprocuct.destroy');
Route::get('/cardprocuct/edit','CardproductController@edit')->name('cardprocuct.edit');
Route::patch('/cardprocuct/update','CardproductController@update')->name('cardprocuct.update');

Route::resource('cardcardcategory' , 'cardcategorycontroller');




Route::resource('printingoffice','PrintingofficeController');

