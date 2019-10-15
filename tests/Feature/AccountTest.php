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

    public function testApiView(){

        $data = factory(\App\Account::class)->create();

        $response = $this->json('GET', '/api/accounts/'. $data->id);

        $response->assertStatus(200)->assertJson($data->toArray());

    }

    public function testApiViewNotFound(){

        $response = $this->json('GET', '/api/accounts/1');

        $response->assertStatus(404);

    }

    public function testApiInsert(){

        $data = factory(\App\Account::class)->make();

        $response = $this->json('POST', '/api/accounts/', $data->toArray());

        $response->assertStatus(200)->assertJson($data->toArray());

    }

    public function testApiUpdate(){

        $data = factory(\App\Account::class)->create();

        $toUpdate = ['title'=>'Conta do João'];

        $response = $this->json('PUT', '/api/accounts/'. $data->id, $toUpdate);

        $response->assertStatus(200)->assertJson($toUpdate);

    }

    public function testApiDelete(){

        $data = factory(\App\Account::class)->create();

        $response = $this->json('DELETE', '/api/accounts/'. $data->id);

        $response->assertStatus(200)->assertJson($data->toArray());

    }
}
