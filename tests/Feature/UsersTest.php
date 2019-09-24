<?php

namespace tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;
use App\Song;

class UsersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
    use WithoutMiddleware;
    
    public function test_user_can_see_profile()
    {   
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->get("users/{$user->id}");
        $response->assertStatus(200);
    }
    
    public function test_user_can_see_followings()
    {   
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->get("users/{$user->id}followings");
        $response->assertStatus(200);
    }
    
    public function test_use_can_see_followers()
    {   
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->get("users/{$user->id}/followers");
        $response->assertStatus(200);
    }
    
    public function test_user_can_see_favorites()
    {   
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->get("users/{$user->id}/favorites");
        $response->assertStatus(200);
    }
    
}
