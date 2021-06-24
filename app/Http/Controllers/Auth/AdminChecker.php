<?php
/**
 * Created by PhpStorm.
 * User: hamid lashani
 * Date: 13/04/2021
 * Time: 12:05 PM
 */

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;

trait AdminChecker
{
    public function loginin(Request $request,$user)
    {
        if(!$user->cellphone){
                        return redirect('/profile/'.$user->id.'/edit');

}
        if($user->is_superuser == 1 ){
            return redirect(route('admin.adminIndex'));
       }
        $redirect = $request->input('url');
        if ($redirect) {
            return redirect()->route($redirect);
        }
    }
}