<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AccountTest extends TestCase
{

    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testApiList(){

        $data = factory(\App\Account::class, 20)->create();

        $response = $this->get('/api/accounts');
        $response->assertStatus(200)->assertJson(['data'=>$data->toArray()]);
        //$response->assertStatus(200)->assertExactJson(['data'=>$data->toArray()]);

    }
}
