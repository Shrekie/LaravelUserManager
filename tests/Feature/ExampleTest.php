<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{

    /**
     * A basic test example.
     *
     * @test
     */
    public function alive()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

}
