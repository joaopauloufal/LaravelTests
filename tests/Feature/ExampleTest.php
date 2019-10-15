<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testDatabaseUsers(){


        factory(\App\User::class)->create([
            'email' => 'teste@teste.com'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'teste@teste.com'
        ]);

    }
}
