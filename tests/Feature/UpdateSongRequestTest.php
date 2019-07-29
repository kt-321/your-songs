<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;
use App\Song;

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
        $response = $this->actingAs($user)->get("songs/{$song->id}/edit");
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
        
            
        $response = $this->actingAs($user)->put("songs/{$song->id}",[
            "song_name" => "CCC",
            "artist_name" => "DDD",
            "music_age" => 1980
        ]);
            
        // $response->assertStatus(Response::HTTP_CREATED);
        
        // 曲詳細ページに戻る
        $response->assertStatus(302);
        $response->assertRedirect("songs/{$song->id}");
        
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
        
        // 曲の情報を更新する
        $response = $this->actingAs($user)->put("songs/{$song->id}",[
            "song_name" => "",
            "artist_name" => "BBB",
            "music_age" => 1970
        ]);
            
        // 曲詳細ページに戻りエラーが表示される
        $response->assertStatus(404);
        $response->assertRedirect("songs/{$song->id}/edit");
        
        // 曲情報が更新されていないことを確認する
        $this->assertDatabaseHas('songs', [
            "user_id" => $user->id,
            "song_name" => "AAA",
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
        
        // 曲の情報を更新する
        $response = $this->actingAs($user)->put("songs/{$song->id}",[
            "song_name" => "",
            "artist_name" => "BBB",
            "music_age" => 1970
        ]);
        
        // 曲詳細ページに戻りエラーが表示される
        $response->assertStatus(404);
        $response->assertRedirect("songs/{$song->id}/edit");
        
        // 曲情報が更新されていないことを確認する
        $this->assertDatabaseHas('songs', [
            "user_id" => $user->id,
            "song_name" => "AAA",
            "artist_name" => "BBB",
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
        
        $response = $this->actingAs($user)->put("songs/{$song->id}",[
            "song_name" => "AAA",
            "artist_name" => "BBB",
            "music_age" => ""
        ]);
        
        // 曲詳細ページに戻りエラーが表示される
        $response->assertStatus(404);
        $response->assertRedirect("songs/{$song->id}/edit");
        
        // 曲情報が更新されていないことを確認する
        $this->assertDatabaseHas('songs', [
            "user_id" => $user->id,
            "song_name" => "AAA",
            "artist_name" => "BBB",
            "music_age" => 1970,
        ]);
    }
}