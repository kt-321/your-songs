<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class UsersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
    
    public function test_users_show()
    {   
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->get("/users/{$user->id}");
        $response->assertStatus(200);
    }
    
    public function test_users_edit()
    {   
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->get("/users/{$user->id}/edit");
        $response->assertStatus(200);
    }
    
    // public function test_users_update()
    // {   
    //     // ユーザーを1人作成
    //     $user = factory(User::class)->create();
        
    //     $response = $this->actingAs($user)->get("/users/{$user->id}/edit");
    //     $response->assertStatus(200);
    // }
    
    
    // public function test_users_index()
    // {
    //     // ユーザーを1人作成
    //     $user1 = factory(User::class)->create();
    //     $user2 = factory(User::class)->create();
    //     $user3 = factory(User::class)->create();
        
    //     $response = $this->actingAs($user1)->get("/users");
    //     $response->assertStatus(200);
    // }
}
