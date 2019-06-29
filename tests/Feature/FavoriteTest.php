<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Song;

class UserFavoriteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
     
    // public function test_users_can_favorite()
    // {   
    //     // ユーザーを１人作成
    //     $user = factory(User::class)->create();
        
    //     // 曲をランダムに１曲追加する
    //     $song = factory(User::class)->create();
        
    //     // 曲をお気に入りに追加する
    //     $response = $this->actingAs($user)->post("/songs/{$song->id}/favorite");
        
    //     // 前の画面に戻る????
    //      $response->assertRedirect();
     
    // }
    
    
    // public function test_users_can_unfavorite()
    // {   
    //     // ユーザーを１人作成
    //     $user = factory(User::class)->create();
        
    //     // 曲をランダムに１曲追加する
    //     $song = factory(Song::class)->create();
        
    //     // 曲をお気に入りに追加する
    //     $response = $this->actingAs($user)->post("/songs/{$song->id}/favorite");
        
    //     // 前の画面に戻る
    //      $response->assertRedirect();
        
        
    //     // 曲をお気に入りから外す
    //     $response = $this->actingAs($user)->post("/songs/{$song->id}/unfavorite");
        
    //     // 前の画面に戻る????
    //      $response->assertRedirect();
    // }
    
    
    
    // public function test_user_can_see_favorites(){
    //     // ユーザーを１人作成
    //     $user = factory(User::class)->create();
        
    //     // 投稿者はランダムで、曲を２曲作成
    //     $song1 = factory(User::class)->create([
    //         "song_name" => "AAA",
    //         "artist_name" => "BBB",
    //         "music_age" => 1970,
    //     ]);
        
    //     $song2 = factory(User::class)->create([
    //         "song_name" => "CCC",
    //         "artist_name" => "DDD",
    //         "music_age" => 1980,
    //     ]);
        
    //     // 作成した２曲をお気に入りに追加する
    //     $response = $this->actingAs($user)->post("/songs/{$song1->id}/favorite");
    //     $response->assertRedirect();
        
    //     $response = $this->actingAs($user)->post("/songs/{$song2->id}/favorite");
    //     $response->assertRedirect();
        
    //     // お気に入り一覧を確認
    //     $response = $this->actingAs($user)->get("/users/{$user->id}/favorites");
    //     $response->assertStatus(200);
        
    //     // 曲数がカウントされていることを確認
    //     $data +=$this->counts($user);
        
    //     // ページネーションされているかを確認
    //     $favorites = $user->favorites()->paginate(10);
    // }
}
