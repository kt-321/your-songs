<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

use Auth;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;
    
    public function test_signup()
    {
        // ユーザー登録画面を表示
        $response = $this->get("signup");
        $response->assertStatus(200);
        
        // ユーザー登録
        $response = $this->post("signup");
        
        // ユーザー登録後、トップページにページ移動
        $response->assertRedirect("/");
    }
}
