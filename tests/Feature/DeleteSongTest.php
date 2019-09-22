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
     
    public function test_valid_user_can_delete_song()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        // 曲を1つ投稿する
        $song = factory(Song::class)->create([
            "user_id" => $user->id,
        ]);
        
        // 曲を削除する
        $response = $this->actingAs($user)->delete(route("songs.destroy"), ["id" => $song->id]);
        
        // マイページに戻る
        $response->assertStatus(302);
        $response->assertRedirect(route("users.show", ["id" => $user->id]));
        
        // 曲がデータベースに残っていないことを確認する
        $this->assertDatabaseMissing('songs', [
            "user_id" => $user->id,
        ]);
    }
    
    public function test_invalid_user_can_not_delete_song()
    {
        // ユーザーを2人作成
        $user1 = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        
        // ユーザー1が曲を1つ投稿する
        $song = factory(Song::class)->create([
            "user_id" => $user1->id,
        ]);
        
        // ユーザー2が曲の削除を試みる
        $response = $this->actingAs($user)->delete(route("songs.destroy"), ["id" => $song->id]);
        
        // マイページに戻る
        $response->assertStatus(302);
        $response->assertRedirect(route("users.show", ["id" => $user->id]));
        
        // 曲がデータベースに残ったままであることを確認する
        $this->assertDatabaseHas('songs', [
            "user_id" => $user1->id,
        ]);
    }
    
}