<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends \TCG\Voyager\Http\Controllers\VoyagerAuthController
{

    public function postLogin(Request $request)
    {   
        $login = request()->input('email');
 
        $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
 
        request()->merge([$field => $login]);

        $request->validate([
            $field => 'required|string',
            'password' => 'required|string',
        ]);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only($field, 'password');

        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

}
