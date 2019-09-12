<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;

use Auth;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    use RefreshDatabase;
    use WithoutMiddleware;
    
    public function test_user_can_view_login()
    {   
        $this->withoutExceptionHandling();
        
        $response = $this->get(route("login"));

        $response->assertStatus(200);
    }
    
    public function test_valid_user_can_login()
    {   
        // ユーザーを１つ作成
        $user = factory(User::class)->create([
            "password" => bcrypt("test1111")
        ]);
        
        // まだ認証されていない
        // $this->assertFalse(Auth::check());
        $this->assertGuest($guard = null);
        
        // ログイン実行
        $response = $this->post(route("login.post"), [
            "email" => $user->email,
            "password" => "test1111"
        ]);
        
        // 認証されている
        $this->assertTrue(Auth::check());
        // $this->assertAuthenticated($guard = null);
        
        // ログイン後にトップページにリダイレクトされる
        $response->assertStatus(302);
        $response->assertRedirect(route("home"));
    }
    
    public function test_invalid_user_cannot_login()
    {   
        // ユーザーを１つ作成
        $user = factory(User::class)->create([
            "password" => bcrypt("test1111")
        ]);
        
        // まだ認証されていない
        $this->assertFalse(Auth::check());
        // $this->assertGuest($guard = null);
        
        // 異なるパスワードでログイン実行
        $response = $this->from(route("login"))->post(route("login.post"), [
            "email" => $user->email,
            "password" => "test2222"
        ]);
        
        // 認証失敗
        $this->assertFalse(Auth::check());
        // $response->assertStatus(302);
        // $this->assertGuest($guard = null);
        
        // ログイン画面に戻る
        $response->assertStatus(302);
        $response->assertRedirect(route("login"));
    }
    
}