<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Modules\Banners\Entities\Banner;
use Modules\Category\Entities\Category;
use Modules\Printingoffice\Entities\printingofficeproducts;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrintingOfficeCard;
use App\Http\Controllers\Auth\GoogleAuthcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PrintingofficeController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ImagesController;
use App\Http\Livewire\Upload;
use App\Http\Livewire\Pages\Largeformat;
use App\Http\Controllers\cardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('قوانین-و-مقررات',[HomeController::class,'terms'])->name('terms');

Route::get('banners/{slug}',[BannerController::class,'categories'])->name('banner.category');
Route::get('getcategories',[Banner::class,'getcategories'])->name('ajax.getcategories');
Route::get('بنر-مناسبتی/{category}',[BannerController::class,'banners'])->name('banners');
Route::get('/بنرمناسبتی/{banner}',[BannerController::class,'banner'])->name('banner');
Route::post('images/category',[ImagesController::class,'getcategoryimages'])->name('get.images.category');
Route::get('مقالات',[ArticleController::class,'index'])->name('articles');
Route::get('چاپ-فضای-خارجی',[PrintingofficeController::class,'largeformats'])->name('largeformats');
Route::get('مقالات/{article}',[ArticleController::class,'single'])->name('article');

Route::get('کارت-ویزیت',[cardController::class,'categories'])->name('cards_category');
Route::get('کارت-ویزیت/{category}',[cardController::class,'cards'])->name('cards');






Route::middleware('auth')->group(function (){

    Route::get('/profile/{id}/edit',function($id){
        $user = User::findOrfail($id);
        return view('profile.edit',[
            'user' => $user
        ]);
    })->name('profile.edit');



    Route::post('/profile/{id}/edit',function($id){
        $validate_date = Validator::make(request()->all(),[
            'name' => 'required',
            'company' =>'required',
            'email' =>'required',
            'phone' =>'',
            'password'         => 'same:password_confirm',
            'password_confirm' => 'same:password'  ,
            'cellphone' =>'required',
            'address' =>'required',
        ],[
            'name.required'=>'نام و نام خانوادگی وارد نشده است',
            'cellphone.required'=>'تلفن همراه وارد نشده است',
            'address.required'=>'آدرس وارد نشده است',
            'company.required'=>'نام شرکت وارد نشده است',
            'phone.required'=>'تلفن ثابت وارد نشده است',
            'email.required'=>'پست الکترونیک وارد نشده است',
            'password_confirm.same'=>'کلمه عبور و تکرار آن همسان نیست',
            'password_confirm.min'=>'کلمه عبور حداقل 8 کارکتر باید باشد',
        ])->validated();

$update = [];
$update['name']  =     $validate_date['name'];
$update['company']  =     $validate_date['company'];
$update['cellphone']  =     $validate_date['cellphone'];
$update['phone']  =     $validate_date['phone'];
$update['address']  =     $validate_date['address'];
if(request()->get('two_factor')){
    $update['two_factor']  =  request()->get('two_factor');
}
if($validate_date['password']){
    $update['password']  =   Hash::make($validate_date['password']);
}


        $user = User::findOrfail($id);
        $user->update($update);

        if($user->cellphone_verified) {
            return back();
        }else{
            $code =  mt_rand(100000,999999);
            $user->update([
                'cellphone_verified_code'=>$code
                    ]
            );
            $user->notify(new \App\Notifications\PrintingOfficeSms([
                'text'=>'',
                'type'=>'otp',
                'code'=> $code
            ] ));
            return redirect(route('cellphone_verified'));
        }

    });


    Route::get('profile',[ProfileController::class, 'index'])->name('profile');
    Route::get('profile/cellphone_verified',[ProfileController::class, 'cellphone_verified'])->name('cellphone_verified');
    Route::post('profile/cellphone_verified',[ProfileController::class, 'cellphone_verified_code'])->name('verifycode');


});



Route::middleware('auth')->group(function () {


    Route::get('چاپ-فضای-خارجی/{largeformat}',[PrintingofficeController::class,'largeformat'])->name('largeformat');
    Route::post('uploadfile', [PrintingofficeController::class,'uploadfile'])->name('uploadfile');
    Route::post('avatar', [PrintingofficeController::class,'avatar'])->name('avatar');
    Route::post('uploadfile2', [PrintingofficeController::class,'uploadfile2'])->name('uploadfile2');
    Route::post('addlforder', [PrintingofficeController::class,'addlforder'])->name('addlforder');
    Route::get('showorder/{order}', [OrdersController::class,'showorder'])->name('showorder');
    Route::get('پرداخت-صورتحساب/{order}', [PrintingofficeController::class,'paymet'])->name('paymet');
    Route::get('payment/callback', [PrintingofficeController::class,'callback'])->name('payment.callback');

    Route::get('ajax',[PrintingofficeController::class,'ajax'])->name('ajax');
    Route::get('card/get_card_ajax',[OrdersController::class,'get_card_ajax'])->name('card.get_card_ajax');
    Route::get('card/get_user_cart_count',[OrdersController::class,'get_user_cart_ount'])->name('card.get_user_cart_ount');
    Route::post('card/payment',[OrdersController::class,'payment'])->name('card.payment');
    Route::get('card/callback', [OrdersController::class,'callback'])->name('card.callback');
    Route::get('آپلود-فایل',[PrintingofficeController::class,'uploadimage'])->name('uploadimage');
    Route::post('imagedelete',[PrintingofficeController::class,'imagedelete'])->name('imagedelete');
    Route::post('addorder', [OrdersController::class,'addorder'])->name('addorder');
    Route::post('orderdelete', [OrdersController::class,'delete'])->name('order.delete');
    Route::get('لیست-سفارشات', [OrdersController::class,'list'])->name('orders');
    Route::get('/کارت_ویزیت/{category}/{card}',[cardController::class,'card'])->name('card');



});




Auth::routes();

Route::get('/auth/google',[GoogleAuthcontroller::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback',[GoogleAuthcontroller::class, 'callback']);


