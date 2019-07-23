<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;
use Auth;

class UserFollowTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
    use WithoutMiddleware;
     
    public function test_user_can_follow()
    {
        // ユーザーを2人作成
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();
           
        // フォローする
        $response = $this->actingAs($user1)->from('users/{$user2->id}')->post("users/{$user2->id}/follow");
           
        // 同じ画面にリダイレクト
        $response->assertStatus(302);
        $response->assertRedirect("users/{$user2->id}");
    }
    
    public function test_user_can_unfollow()
    {
        // ユーザーを2人作成
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();
           
        // フォローする
        $response = $this->actingAs($user1)->from('users/{$user2->id}')->post("users/{$user2->id}/follow");
        
        // フォローを外す
        $response = $this->actingAs($user1)->from('users/{$user2->id}')->delete("users/{$user2->id}/unfollow");
           
        // 同じ画面にリダイレクト
        $response->assertStatus(302);
        $response->assertRedirect("users/{$user2->id}");
    }
    
    public function test_user_can_see_followings()
    {
        // ユーザーを2人作成
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        
        // ユーザー1がユーザー2をフォローする
        $response = $this->actingAs($user1)->post("users/{$user2->id}/follow");
        
        // ユーザー1がフォローしているユーザー一覧を見る
        $response = $this->actingAs($user1)->get("users/{$user1->id}/followings");  
        $response->assertStatus(200);
    }
    
    public function test_user_can_see_followers()
    {
        // ユーザーを2人作成
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        
        // ユーザー1がユーザー2をフォローする
        $response = $this->actingAs($user1)->post("users/{$user2->id}/follow");
        
        // ユーザー1をフォローしているユーザー一覧を見る
        $response = $this->actingAs($user1)->get("users/{$user1->id}/followers");  
        $response->assertStatus(200);
    }
}