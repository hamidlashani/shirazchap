<?php
/**
 * Created by PhpStorm.
 * User: hamid lashani
 * Date: 15/04/2021
 * Time: 12:04 AM
 */

namespace App\Notifications\channels;


use Ghasedak\GhasedakApi;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class GhasedakChanel
{
    public function send($notifiable , Notification $notification){

        $api = new GhasedakApi(env('GHASEDAKAPI_KEY'));
        $cellphone = Auth::user()->cellphone;
        $type = $notification->type;
        $code = $notification->code;
        $text = $notification->text;
        $line_number = env('GHASEDAKAPI_LINENUMBER') ;

        if($type == 'otp') {
            $api->Verify(
                $cellphone,  // receptor
                1,              // 1 for text message and 2 for voice message
                "authcode1",  // name of the template which you've created in you account
                $code      // parameters (supporting up to 10 parameters)
            );
        }
        if($type == 'sms') {
            $api->SendSimple(
                $cellphone,
                $text,
                $line_number
            );
        }
    }
}