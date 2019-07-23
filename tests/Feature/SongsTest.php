<?php

namespace Tests\Feature;

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
    
    public function test_user_can_see_song_details_page()
    {   
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        // 曲を1つ作成
        $song = factory(Song::class)->create();
        
        $response = $this->actingAs($user)->get("songs/{$song->id}");
        $response->assertStatus(200);
    }
    
}
