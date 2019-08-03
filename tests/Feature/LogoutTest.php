<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

use Auth;

class LogoutTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
     
    public function test_logout()
    {  
        // ユーザーを１つ作成
        $user = factory(User::class)->create();
        
        // ログイン済み
        $this->actingAs($user);
        
        // 認証済み
        $this->assertAuthenticated($guard = null);
        
        // ログアウトを実行
        $response = $this->get(route("logout.get"));
        
        // 認証されていない
        $this->assertGuest($guard = null);
        
        // トップページにリダイレクト
        $response->assertRedirect(route("welcome"));
    }
}
