<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;

class SearchForSongsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    use WithoutMiddleware;
    
    public function test_user_can_see_search_for_users_page()
    {
        // ユーザーを１人作成する
        $user = factory(User::class)->create();
        
        // ユーザーの検索画面を表示
        $response = $this->actingAs($user)->get("users");
        $response->assertStatus(200);
    }
    
    public function test_user_can_search_for_users_by_name()
    {
        // ユーザーを１人作成
        $user1 = factory(User::class)->create();
        
        // ユーザーを追加で1人作成
        $user2 = factory(User::class)->create([
            "name" => "AAA",
            "age" => 10,
            "gender" => 1,
            "favorite_music_age" => 1970,
            "favorite_artist" => "BBB",
        ]);
        
        // ユーザーの検索画面を表示
        $response = $this->actingAs($user)->get("users");
        $response->assertStatus(200);
        
        // ユーザー名で検索
        $response = $this->actingAs($user)->from("users")->get("users",[
            "name" => "AAA"
        ]);
        
        // 同じ画面で検索結果を表示する
        $response->assertStatus(302);
        $response->assertRedirect("users");
        
        
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
    
    
    
    public function test_user_can_search_for_users_by_age()
    {
        // ユーザーを１人作成
        $user1 = factory(User::class)->create();
        
        // ユーザーを追加で1人作成
        $user2 = factory(User::class)->create([
            "name" => "AAA",
            "age" => 10,
            "gender" => 1,
            "favorite_music_age" => 1970,
            "favorite_artist" => "BBB",
        ]);
        
        // ユーザーの検索画面を表示
        $response = $this->actingAs($user)->get("users");
        $response->assertStatus(200);
        
        // ユーザー名で検索
        $response = $this->actingAs($user)->from("users")->get("users",[
            "age" => 10,
        ]);
        
        // 同じ画面で検索結果を表示する
        $response->assertStatus(302);
        $response->assertRedirect("users");
    }
    
    public function test_user_can_search_for_users_by_gender()
    {
        // ユーザーを１人作成
        $user1 = factory(User::class)->create();
        
        // ユーザーを追加で1人作成
        $user2 = factory(User::class)->create([
            "name" => "AAA",
            "age" => 10,
            "gender" => 1,
            "favorite_music_age" => 1970,
            "favorite_artist" => "BBB",
        ]);
        
        // ユーザーの検索画面を表示
        $response = $this->actingAs($user1)->get("users");
        $response->assertStatus(200);
        
        // ユーザー名で検索
        $response = $this->actingAs($user1)->from("users")->get("users",[
            "gender" => 1,
        ]);
        
        // 同じ画面で検索結果を表示する
        $response->assertStatus(302);
        $response->assertRedirect("users");
    }
    
    public function test_user_can_search_for_users_by_favorite_music_age()
    {
        // ユーザーを１人作成
        $user1 = factory(User::class)->create();
        
        // ユーザーを追加で1人作成
        $user2 = factory(User::class)->create([
            "name" => "AAA",
            "age" => 10,
            "gender" => 1,
            "favorite_music_age" => 1970,
            "favorite_artist" => "BBB",
        ]);
        
        // ユーザーの検索画面を表示
        $response = $this->actingAs($user1)->get("users");
        $response->assertStatus(200);
        
        // 好きな音楽の年代で検索
        $response = $this->actingAs($user1)->from("users")->get("users",[
            "favorite_music_age" => 1970,
        ]);
        
        // 同じ画面で検索結果を表示する
        $response->assertStatus(302);
        $response->assertRedirect("users");
    }
    
    public function test_user_can_search_for_users_by_favorite_artist()
    {
        // ユーザーを１人作成
        $user1 = factory(User::class)->create();
        
        // ユーザーを追加で1人作成
        $user2 = factory(User::class)->create([
            "name" => "AAA",
            "age" => 10,
            "gender" => 1,
            "favorite_music_age" => 1970,
            "favorite_artist" => "BBB",
        ]);
        
        // ユーザーの検索画面を表示
        $response = $this->actingAs($user1)->get("users");
        $response->assertStatus(200);
        
        // 好きな音楽の年代で検索
        $response = $this->actingAs($user1)->from("users")->get("users",[
            "favorite_artist" => "BBB",
        ]);
        
        // 同じ画面で検索結果を表示する
        $response->assertStatus(302);
        $response->assertRedirect("users");
    }
}
