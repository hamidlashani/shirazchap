<?php

namespace App\Http\Controllers\Auth;



use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthcontroller extends Controller
{
use AdminChecker ;
public function redirect(){
    return Socialite::driver('google')->redirect();

}

public function callback(Request $request){
    try{
        $googleuser = Socialite::driver('google')->user();
        $user = User::where('email',$googleuser->email)->first();



        if($user){
            auth()->loginUsingId($user->id);
        }else{
            $newuser = User::create([
                'name' => $googleuser->name,
                'email' =>$googleuser->email ,
                'password' => bcrypt(\Str::random(16))
            ]);
            auth()->loginUsingId($newuser->id);
        }

        if(!$user->cellphone){
            return redirect('/profile/'.$user->id.'/edit');
        }

        else

        if (Session::get('backurl')) {
            return redirect(url(Session::get('backurl')));
        }


        if(auth()->user()->is_superuser) {
            return redirect(route('admin.adminIndex'));
        }else{
            return redirect(url('/'));
        }
    }catch (\Exeption $e){
        //show error message
        return 'error';

    }
}


}
