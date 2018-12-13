<?php

namespace Tests;

use App\User;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp()
    {
        parent::setUp();
    }

    /**
     * Register via non web API.
     *
     * @return void
     */
    protected function detachedRegister($user = [])
    {   
        $registrationPostBody = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'password_confirmation' => $user->password
        ];

        $response = $this->post('/api/register', 
        $registrationPostBody);

        return $response;
    }

    protected function login($scopes = [])
    {
        Passport::actingAs(
            $user = factory(User::class)->create(),
            $scopes
        );

        return $user;
    }
}