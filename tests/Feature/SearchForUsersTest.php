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
        $response = $this->actingAs($user)->get(route("users.index"));
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
    
        // ユーザーをユーザー名で検索
        // $response = $this->actingAs($user1)->get(route("users.index"), [
        //     "name" => "AAA"
        // ]);
        
        // // ユーザーの検索画面で検索結果を表示する
        // $response->assertStatus(200);
        
        // ユーザーの検索画面でユーザーをユーザー名「AAA」で検索し、ユーザーAAAが表示されていることを確認する
        $this->actingAs($user1)->get(route("users.index"), [
            "name" => "AAA"
        ])->assertSee("AAA");
        
        // $this->route("users.index")
        //      ->assertSee("AAA");
        
        
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
        
        // ユーザーの検索画面でユーザーを年齢「10（代）」で検索し、ユーザーAAAが表示されていることを確認する
        $response = $this->actingAs($user1)->get(route("users.index"), [
            "age" => 10,
        ])->assertSee("AAA");
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
        
        // ユーザーの検索画面でユーザーを性別「1(男性)」で検索し、ユーザーAAAが表示されていることを確認する
        $response = $this->actingAs($user1)->get(route("users.index"), [
            "gender" => 1,
        ])->assertSee("AAA");
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
        
        // ユーザーの検索画面でユーザーを好きな音楽の年代「1970（年代）」で検索し、ユーザーAAAが表示されていることを確認する
        $response = $this->actingAs($user1)->get(route("users.index"), [
            "favorite_music_age" => 1970,
        ])->assertSee("AAA");
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
        
        // ユーザーの検索画面でユーザーを好きなアーティスト「BBB」で検索し、ユーザーAAAが表示されていることを確認する
        $response = $this->actingAs($user1)->get(route("users.index"), [
            "favorite_artist" => "BBB",
        ])->assertSee("AAA");
        
        
    }
}
