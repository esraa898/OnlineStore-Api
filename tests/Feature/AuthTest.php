<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{

    private $login_url='/api/auth/login';
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_with_wrong_data()
    {
        $response = $this->post($this->login_url);

        $response->assertStatus(200)->assertSee('errors')->assertJson(['status'=>400]);
    }
    public function test_login_with_correct_data(){

        $data=[
            'email'=>'esraa@gmail.com',
            'password' => '12345678',
        ];
        $response = $this->post($this->login_url,$data);
        $response->assertStatus(200)->assertSee('data')->assertJson(['status'=>200]);


    }
    public function test_user_cart(){
        $headers=[
            'token'=>'values'
        ];

        $response= $this->get('/api/cart/usercart',$headers);
        $response->assertStatus(200)->assertSee('data');

    }
}
