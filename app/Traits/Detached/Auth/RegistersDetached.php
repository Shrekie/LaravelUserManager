<?php

namespace App\Traits\Detached\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Events\Registered;

trait RegistersDetached 
{
    
    public function registerUser(Request $request) {

        $this->userValidator($request->all())->errors();

        event(new Registered($user = 
        $this->userGenerator($request->all())));

        return $user;
    }

}