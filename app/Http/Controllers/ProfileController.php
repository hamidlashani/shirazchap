<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index',compact('user'));
    }


    public function cellphone_verified()
    {
        return view('profile.two-factor-auth');
    }

    public function cellphone_verified_code(Request $request)
    {

            $verified_code = $request->user()->cellphone_verified_code;
        if($verified_code == $request->code)
        {
            $request->user()->update([
                'cellphone_verified'=>1
            ]);
            return redirect(url('/'));
        }else{
            return redirect('/profile/cellphone_verified')->with('status', 'کد وارد شده صحیح نمی باشد');

        }
    }
}
