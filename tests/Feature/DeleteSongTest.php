<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;
use App\Song;

class DeleteSongTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
    use WithoutMiddleware;
     
    public function test_user_can_delete_song()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        //曲を投稿する
        $song = factory(Song::class)->create([
            "user_id" => $user->id,
        ]);
        
        //曲を削除する
        $response = $this->actingAs($user)->delete("songs/{$song->id}");
        
        // マイページに戻る
        $response->assertStatus(302);
        $response->assertRedirect("users/{$user->id}");
    }
    
}