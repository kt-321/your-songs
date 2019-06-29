<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


use App\User;
use App\Song;

class SongsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
     use RefreshDatabase;
     
    public function test_user_can_post_song()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        //曲の投稿画面を表示する
        $response = $this->actingAs($user)->get("/songs/create");
        $response->assertStatus(200);
        
        //曲を投稿する
        $response = $this->actingAs($user)->post("/songs");
        
        // 曲の詳細画面を表示
        $response = $this->actingAs($user)->get("/songs/{$id}/show");
        $response->assertStatus(200);
    }
    
    public function test_user_can_edit_song()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        // 作成したユーザーで曲を１曲投稿する
        $song = factory(User::class)->create([
            "user_id" => $user->id,
            "song_name" => "AAA",
            "artist_name" => "BBB",
            "music_age" => 1970,
        ]);
        
        //曲情報の編集画面が表示されることを確認する
        $response = $this->actingAs($user)->edit("/songs/{$song->id}/edit");
        $response->assertStatus(200);
        
        // 曲情報を更新できることを確認
        $response = $this->actingAs($user)->put("/songs/{$song->id}");
        
        // 曲詳細画面へ戻ることを確認
        $response->assertRedirect("songs/{$song->id}");
    }
    
    public function test_user_can_delete_song()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        // 作成したユーザーで曲を１曲投稿する
        $song = factory(Song::class)->create([
            "user_id" => $user->id,
        ]);
        
        // 曲を削除できることを確認
        $response = $this->actingAs($user)->delete("/songs/{$song->id}");
        
        // マイプロフィールに戻ることを確認 
        $response->assertRedirect("users/{$user->id}");
    }
    
    public function test_songs_index()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        // 曲を１０曲追加
        factory(Song::class, 10)->create();
        
        // 曲の一覧画面を表示する
        $response = $this->actingAs($user)->get("/songs/index");
        $response->assertStatus(200);
    }
}
