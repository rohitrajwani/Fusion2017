<?php

namespace App\Http\Controllers\Auth;

//use App\User;
use App\Models\User;

use Validator;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   /**
     * Redirect the user to the google authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $ch= curl_init();
        
        curl_setopt ($ch, CURLOPT_CAINFO, "C:\wamp64\bin\php\php5.6.16\cacert.pem");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

        echo '<script>alert("testing")</script>';
        
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return Redirect::to('auth/google');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return Redirect::to('portal/login');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $googleUser
     * @return User
     */
    private function findOrCreateUser($googleUser)
    {
        if ($authUser = User::where('google_id', $googleUser->id)->first()) {
            return $authUser;
        }

        return User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'avatar' => $googleUser->avatar
        ]);
    }
    
    private function createUser(){
        
        $user = new User;
        
        $user->name = Input::post('username');
        $user->email = Input::post('email');
        $user->save();
        
        return Redirect::back();
        
    }
}
