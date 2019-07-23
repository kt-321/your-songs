<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;
use App\Song;

class FavoriteTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    
    use RefreshDatabase;
    use WithoutMiddleware;
    
    public function test_user_can_add_song_to_favorites()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        //曲を1つ作成
        $song = factory(Song::class)->create();
        
        //曲をお気に入り登録する
        $response = $this->actingAs($user)->from('songs/{$song->id}')->post("songs/{$song->id}/favorite");
        
        // 同じ画面にリダイレクト
        $response->assertStatus(302);
        $response->assertRedirect("songs/{$song->id}");
        
        //曲をお気に入りから外す
        $response = $this->actingAs($user)->from('songs/{$song->id}')->delete("songs/{$song->id}/unfavorite");
        
        // 同じ画面にリダイレクト
        $response->assertStatus(302);
        $response->assertRedirect("songs/{$song->id}");
        
    }
    
    public function test_user_can_remove_song_from_favorites()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        //曲を1つ作成
        $song = factory(Song::class)->create();
        
        //曲をお気に入り登録する
        $response = $this->actingAs($user)->from('songs/{$song->id}')->post("songs/{$song->id}/favorite");
        
        //曲をお気に入りから外す
        $response = $this->actingAs($user)->from('songs/{$song->id}')->delete("songs/{$song->id}/unfavorite");
        
        // 同じ画面にリダイレクト
        $response->assertStatus(302);
        $response->assertRedirect("songs/{$song->id}");
        
    }
}
