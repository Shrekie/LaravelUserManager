<?php

namespace App\Http\Controllers\Detached\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\User;
//use App\Traits\Detached\OAuthToken\GrantsPasswordToken;
use App\Traits\Detached\Auth\RegistersDetached;

class UserRegister extends Controller
{

    use RegistersDetached;

    /*
     * Validate new user instance
     */
    protected function userValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /*
     * Generate user instance
     */
    protected function userGenerator(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    // index, show, create, store, update og destroy
    public function create (Request $request)
    {
        return response($this->registerUser($request), 201);
    }

}
