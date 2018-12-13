<?php

namespace App\Traits\Detached\OAuthToken;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Events\Registered;

trait GrantsPasswordToken 
{
    /* Make client always do direct
    OAuth server call for tokens?*/
    public function retrieveUserToken () {
    
    }

}