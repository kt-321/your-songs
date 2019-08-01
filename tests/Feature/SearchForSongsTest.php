<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;
use App\Song;

class SearchForSongsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    use WithoutMiddleware;
    
    public function test_user_can_see_search_for_songs_page()
    {
        // ユーザーを１人作成する
        $user = factory(User::class)->create();
        
        // 曲の検索画面を表示
        $response = $this->actingAs($user)->get("search");
        $response->assertStatus(200);
    }
    
    public function test_user_can_search_for_songs_by_song_name_ordered_by_created_at()
    {
        // ユーザーを１人作成する
        $user = factory(User::class)->create();
        
        // 曲を1つ作成
        $user = factory(Song::class)->create([
            "song_name" => "AAA",
            "artist_name" => "BBB",
            "music_age" => 1970,
        ]);
        
        // 曲の検索画面を表示
        $response = $this->actingAs($user)->get("search");
        $response->assertStatus(200);
        
        // 曲名で検索し、投稿が新しい順で並び替える   
        $response = $this->actingAs($user)->from("search")->get("search",[
            "song_name" => "AAA",
            "order" => "created_at",
        ]);
        
        // 同じ画面で検索結果を表示する
        $response->assertStatus(302);
        $response->assertRedirect("search");
        
        // $response = $this->actingAs($user)
        //     ->postJson(route("search.index"), [
        //         "song_name" => "AAA",
        //         "artist_name" => "",
        //         "music_age" => 1970
        //     ]);
        
        // $response->assertStatus(
        //     Response::HTTP_UNPROCESSABLE_ENTITY
        // );
        // $response->assertJsonValidationErrors("artist_name");
    }
    
    public function test_user_can_search_for_songs_by_artist_name_ordered_by_favorites_ranking()
    {
        // ユーザーを１人作成する
        $user = factory(User::class)->create();
        
        // 曲を1つ作成
        $user = factory(Song::class)->create([
            "song_name" => "AAA",
            "artist_name" => "BBB",
            "music_age" => 1970,
        ]);
        
        // 曲の検索画面を表示
        $response = $this->actingAs($user)->get("search");
        $response->assertStatus(200);
        
        // 曲名で検索し、投稿が新しい順で並び替える   
        $response = $this->actingAs($user)->from("search")->get("search",[
            "artist_name" => "BBB",
            "order" => "favorites_ranking",
        ]);
        
        // 同じ画面で検索結果を表示する
        $response->assertStatus(302);
        $response->assertRedirect("search");
    }
    
    public function test_user_can_search_for_songs_by_music_age_ordered_by_comments_ranking()
    {
        // ユーザーを１人作成する
        $user = factory(User::class)->create();
        
        // 曲を1つ作成
        $user = factory(Song::class)->create([
            "song_name" => "AAA",
            "artist_name" => "BBB",
            "music_age" => 1970,
        ]);
        
        // 曲の検索画面を表示
        $response = $this->actingAs($user)->get("search");
        $response->assertStatus(200);
        
        // 曲名で検索し、投稿が新しい順で並び替える   
        $response = $this->actingAs($user)->from("search")->get("search",[
            "music_age" => 1970,
            "order" => "comments_ranking",
        ]);
        
        // 同じ画面で検索結果を表示する
        $response->assertStatus(302);
        $response->assertRedirect("search");
    }
}
