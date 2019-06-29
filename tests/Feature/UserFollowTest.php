<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class UserFollowTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
     
    // public function test_user_can_follow()
    // {
    //     // ユーザーを2人作成
    //     $user1 = factory(User::class)->create();
    //     $user2 = factory(User::class)->create();
           
        // フォローする
    //     $response = $this->actingAs($user1)->post("/users/{$user2->id}/follow");
           
        //   １つ前の画面に戻る
    //     $response->assertRedirect();
    // } 
    
    // public function test_user_can_unfollow()
    // {
    //     // ユーザーを2人作成
    //     $user1 = factory(User::class)->create();
    //     $user2 = factory(User::class)->create();
    
           // フォローする
    //     $response = $this->actingAs($user1)->post("/users/{$user2->id}/follow");
           
           // フォローを外す
        //   $response = $this->actingAs($user1)->post("/users/{$user2->id}/unfollow");
           
           // １つ前の画面に戻る
    //     $response->assertRedirect();
    // }
    
    // public function test_user_can_see_followings()
    // {
    //     // ユーザーを3人作成
    //     $user1 = factory(User::class)->create();
    //     $user2 = factory(User::class)->create();
    //     $user3 = factory(User::class)->create();
        
    //     $response = $this->actingAs($user1)->post("/users/{$user2->id}/follow");
    //     $response = $this->actingAs($user1)->post("/users/{$user3->id}/follow");
           
           // １つ前の画面に戻る
    //     $response->assertRedirect();
    // }
    
    // public function test_users_see_followers()
    // {
    //     // ユーザーを3人作成
    //     $user1 = factory(User::class)->create();
    //     $user2 = factory(User::class)->create();
    //     $user3 = factory(User::class)->create();
        
    //     $response = $this->actingAs($user2)->post("/users/{$user1->id}/follow");
    //     $response = $this->actingAs($user3)->post("/users/{$user1->id}/follow");
        
    //     // １つ前の画面に戻る
    //     $response->assertRedirect();
    // }
    
    
}
