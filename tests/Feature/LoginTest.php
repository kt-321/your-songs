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
        $response = $this->get("login");

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
        $response = $this->post("login", [
            "email" => $user->email,
            "password" => "test1111"
        ]);
        
        // 認証されている
        // $this->assertTrue(Auth::check());
        $this->assertAuthenticated($guard = null);
        
        // ログイン後にトップページにリダイレクトされる
        $response->assertRedirect("/home");
    }
    
    public function test_invalid_user_cannot_login()
    {   
        // ユーザーを１つ作成
        $user = factory(User::class)->create([
            "password" => bcrypt("test1111")
        ]);
        
        // まだ認証されていない
        // $this->assertFalse(Auth::check());
        $this->assertGuest($guard = null);
        
        // 異なるパスワードでログイン実行
        $response = $this->post("login", [
            "email" => $user->email,
            "password" => "test2222"
        ]);
        
        // 認証失敗
        // $this->assertFalse(Auth::check());
        $this->assertGuest($guard = null);
        
        // セッションにエラーを含むことを確認
        $response->assertSessionHasErrors(["email"]);
        
        // エラーメッセージを確認
        $this->assertEquals("メールアドレスあるいはパスワードが正しくありません。",
        session("errors")->first("email"));
    }
    
}