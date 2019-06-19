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
     
    public function test_users_index()
    {
        // $this->assertTrue(true);
        
        // // ユーザーを1人作成
        // $user1 = factory(User::class)->create();
        // $user2 = factory(User::class)->create();
        // $user3 = factory(User::class)->create();
        
        // $this->actingAs($user1)->get("/users")
        // ->see("ユーザー")
        // ->see($user3->name)
        // ->see($user2->name)
        // ->see($user1->name);
    }
}
