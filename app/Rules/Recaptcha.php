<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Recaptcha implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        try{

            $client = new \GuzzleHttp\Client();
            $response = $client->request('post','https://www.google.com/recaptcha/api/siteverify',[
                'form_params' =>[
                    'secret'=> env('GOOGLE_RECAPTCHA_SECRET_KEY'),
                    'response' => $value ,
                    'remoteip' => request()->ip() ,
                ]
            ]);
          return $response = json_decode($response->getbody());

        }catch (\ Exception $e){
            return false;

        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
