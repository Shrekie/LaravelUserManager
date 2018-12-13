<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserAuth extends TestCase
{
    use RefreshDatabase;

    /**
     * Non web API registration returns expected client JSON.
     *
     * @test
     */
    public function detached_registration_return_correct()
    {
        $user = factory(User::class)->make();
        
        $response = $this->detachedRegister($user);

        $expectedResponse = 
        ['name' => $user->name, 
        'email' => $user->email];

        $response->assertStatus(201)
        ->assertJson($expectedResponse);
    }

}
