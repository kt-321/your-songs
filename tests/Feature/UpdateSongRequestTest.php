<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;
use App\Song;

use Auth;

class UpdateSongRequestTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
    use WithoutMiddleware;
     
     
    public function test_user_can_see_song_edit_page()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        //曲を投稿する
        $song = factory(Song::class)->create([
            "user_id" => $user->id,
            "song_name" => "AAA",
            "artist_name" => "BBB",
            "music_age" => 1970,
        ]);
        
        //曲の編集画面を表示する
        $response = $this->actingAs($user)->get(route("songs.edit", ["id" => $song->id]));
        $response->assertStatus(200);
    }
    
    public function test_request_should_pass_when_data_is_provided()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        //曲を投稿する
         $song = factory(Song::class)->create([
            "user_id" => $user->id,
            "song_name" => "AAA",
            "artist_name" => "BBB",
            "music_age" => 1970,
        ]);
        
        //曲情報を更新する
        $response = $this->actingAs($user)->put(route("songs.update", [$song]), [
            "song_name" => "CCC",
            "artist_name" => "DDD",
            "music_age" => 1980
        ]);
            
        
        // 曲詳細ページに戻る
        $response->assertStatus(302);
        // $response->assertRedirect("songs/{$song->id}");
        $response->assertRedirect(route("songs.show", [$song]));
        
        // 更新された曲がデータベースに保存されていることを確認する
        $this->assertDatabaseHas('songs', [
            "user_id" => $user->id,
            "song_name" => "CCC",
            "artist_name" => "DDD",
            "music_age" => 1980,
        ]);
    }
    
    public function test_request_should_fail_when_no_song_name_is_provided()
    {   
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        //曲を投稿する
        $song = factory(Song::class)->create([
            "user_id" => $user->id,
            "song_name" => "AAA",
            "artist_name" => "BBB",
            "music_age" => 1970,
        ]);
        
        // 曲名を空白のまま曲情報の更新を試みる
        $response = $this->actingAs($user)->from(route("songs.edit", [$song]))->put(route("songs.update", [$song]), [
            "song_name" => "",
            "artist_name" => "BBB",
            "music_age" => 1970
        ]);
            
        // 曲編集ページが表示される
        $response->assertStatus(302);
        $response->assertRedirect(route("songs.edit", [$song]));
        
        // 曲情報が更新されて保存されていないことを確認する
        $this->assertDatabaseMissing('songs', [
            "user_id" => $user->id,
            "song_name" => "",
            "artist_name" => "BBB",
            "music_age" => 1970,
        ]);
    }
    
    public function test_request_should_fail_when_no_artist_name_is_provided()
    {   
         // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        //曲を投稿する
         $song = factory(Song::class)->create([
            "user_id" => $user->id
        ]);
        
        // アーティスト名を空白のまま曲情報の更新を試みる
        $response = $this->actingAs($user)->from(route("songs.edit", [$song]))->put(route("songs.update", [$song]), [
            "song_name" => "",
            "artist_name" => "BBB",
            "music_age" => 1970
        ]);
        
        // 曲編集ページに戻る
        $response->assertStatus(302);
        $response->assertRedirect(route("songs.edit", [$song]));
        
        // 曲情報が更新されて保存されていないことを確認する
        $this->assertDatabaseMissing('songs', [
            "user_id" => $user->id,
            "song_name" => "AAA",
            "artist_name" => "",
            "music_age" => 1970,
        ]);
    }
    
    public function test_request_should_fail_when_no_music_age_is_provided()
    {   
         // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        //曲を投稿する
         $song = factory(Song::class)->create([
            "user_id" => $user->id
        ]);
        
        // 音楽の年代を空白のまま曲情報の更新を試みる
        $response = $this->actingAs($user)->from(route("songs.edit", [$song]))->put(route("songs.update", [$song]), [
            "song_name" => "AAA",
            "artist_name" => "BBB",
            "music_age" => ""
        ]);
        
        
        $this->assertTrue(Auth::check());
        
        // 曲編集ページに戻る
        $response->assertStatus(302);
        // $response->assertRedirect(route("songs.edit", ["id" => $song->id]));
        $response->assertRedirect(route("songs.edit", [$song]));
        
        
    
        // 曲情報が更新されて保存されていないことを確認する
        $this->assertDatabaseMissing('songs', [
            "user_id" => $user->id,
            "song_name" => "AAA",
            "artist_name" => "BBB",
            "music_age" => "",
        ]);
    }
}