<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithoutMiddleware;


use App\User;
use App\Song;

class SaveSongRequestTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
    use WithoutMiddleware;
     
    //  protected function setUp(): void
    // {
    //     parent::setUp();

    //     $user = factory(User::class)->create();
    // }
     
    public function test_user_can_see_song_post_page()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        //曲の投稿画面を表示する
        $response = $this->actingAs($user)->get("songs/create");
        $response->assertStatus(200);
    }
    
    public function test_request_should_pass_when_data_is_provided()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        //曲を投稿する
        $response = $this->actingAs($user)->post("songs",[
            "song_name" => "AAA",
            "artist_name" => "BBB",
            "music_age" => 1970,
            "description" => "CCCCCC",
            "video_url" => "DDD"
        ]);

        // 曲詳細ページに移動する
        $response->assertStatus(302);
        $response->assertRedirect("songs/{$song->id}");
    }
    
    public function test_request_should_fail_when_no_song_name_is_provided()
    {   
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        
        //曲名を空白にして曲情報を更新する
        $response = $this->actingAs($user)->from("songs/create")->post("songs",[
            "song_name" => "",
            "artist_name" => "BBB",
            "music_age" => 1970,
            "description" => "CCCCCC",
            "video_url" => "DDD"
        ]);
        
        // 同画面に戻る
        $response->assertStatus(404);
        $response->assertJsonValidationErrors("song_name");
        $response->assertRedirect("songs/create");
    }
    
    public function test_request_should_fail_when_no_artist_name_is_provided()
    {   
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        //曲名を空白にして曲情報を更新する
        $response = $this->actingAs($user)->from("songs/create")->post("songs",[
            "song_name" => "AAA",
            "artist_name" => "",
            "music_age" => 1970,
            "description" => "CCCCCC",
            "video_url" => "DDD"
        ]);
        
        // 同画面に戻る
        $response->assertStatus(404);
        $response->assertJsonValidationErrors("artist_name");
        $response->assertRedirect("songs/create");
        
    }
    
    public function test_request_should_fail_when_no_music_age_is_provided()
    {   
         // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        $response = $this->actingAs($user)->from("songs/create")->post("songs",[
            "song_name" => "AAA",
            "artist_name" => "BBB",
            "music_age" => "",
            "description" => "CCCCCC",
            "video_url" => "DDD"
        ]);
        
        // 同画面に戻る
        $response->assertStatus(404);
        $response->assertJsonValidationErrors("music_age");
        $response->assertRedirect("songs/create");
    }
    
}