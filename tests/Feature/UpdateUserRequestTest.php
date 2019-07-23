<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;

class UpdateUserRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
    use WithoutMiddleware;
    
    public function test_user_can_see_song_edit_page()
    {   
        // ユーザーを1人作成
        $user = factory(User::class)->create([
            "name" => "AAA",
            "email" => "BBB@gmail.com",
            "age" => 20,
            "gender" => 1,
            "favorite_music_age" => 1970,
            "favorite_artist" => "cccccc",
            "comment" => "dddddd"
        ]);
        
        //プロフィールの編集画面を表示する
        $response = $this->actingAs($user)->get("/users/{$user->id}/edit");
        $response->assertStatus(200);
    }
    
    public function test_request_should_pass_when_data_is_provided()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create([
            "name" => "AAA",
            "email" => "BBB@gmail.com",
            "age" => 20,
            "gender" => 1,
            "favorite_music_age" => 1970,
            "favorite_artist" => "cccccc",
            "comment" => "dddddd"
        ]);
         
        // プロフィールを更新する   
        $response = $this->actingAs($user)->put("users/{$user->id}",[
            "name" => "EEE",
            "email" => "FFF@gmail.com",
            "age" => 30,
            "gender" => 2,
            "favorite_music_age" => 1980,
            "favorite_artist" => "gggggg",
            "comment" => "hhhhhh"
        ]);
        
        // プロフィール画面に戻る
        $response->assertStatus(302);
        $response->assertRedirect("/users/{$user->id}");
        
        // プロフィールが更新されていることを確認
        $this->assertDatabaseHas('users', [
            "name" => "EEE",
            "email" => "FFF@gmail.com",
            "age" => 30,
            "gender" => 2,
            "favorite_music_age" => 1980,
            "favorite_artist" => "gggggg",
            "comment" => "hhhhhh"
        ]);
    }
    
    public function test_request_should_fail_when_no_name_is_provided()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create([
            "name" => "AAA",
            "email" => "BBB@gmail.com",
            "age" => 20,
            "gender" => 1,
            "favorite_music_age" => 1970,
            "favorite_artist" => "cccccc",
            "comment" => "dddddd"
        ]);
         
        // プロフィールを更新する   
        $response = $this->actingAs($user)->from("users/{$user->id}/edit")->put("users/{$user->id}",[
            "name" => "",
            "email" => "FFF@gmail.com",
            "age" => 30,
            "gender" => 2,
            "favorite_music_age" => 1980,
            "favorite_artist" => "gggggg",
            "comment" => "hhhhhh"
        ]);
        
        // プロフィール編集画面に戻る
        $response->assertStatus(404);
        $response->assertRedirect("users/{$user->id}/edit");
        
        // プロフィールが更新されていないことを確認
        $this->assertDatabaseHas('users', [
            "name" => "AAA",
            "email" => "BBB@gmail.com",
            "age" => 20,
            "gender" => 1,
            "favorite_music_age" => 1970,
            "favorite_artist" => "cccccc",
            "comment" => "dddddd"
        ]);
    }
    
    public function test_request_should_fail_when_no_email_is_provided()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create([
            "name" => "AAA",
            "email" => "BBB@gmail.com",
            "age" => 20,
            "gender" => 1,
            "favorite_music_age" => 1970,
            "favorite_artist" => "cccccc",
            "comment" => "dddddd"
        ]);
         
        // プロフィールを更新する   
        $response = $this->actingAs($user)->from("users/{$user->id}/edit")->put("users/{$user->id}",[
            "name" => "EEE",
            "age" => 30,
            "gender" => 2,
            "favorite_music_age" => 1980,
            "favorite_artist" => "gggggg",
            "comment" => "hhhhhh"
        ]);
        
        // プロフィールの更新に失敗し、プロフィール編集画面に戻る
        $response->assertStatus(404);
        $response->assertRedirect("users/{$user->id}/edit");
        
        // プロフィールが更新されていないことを確認
        $this->assertDatabaseHas('users', [
            "name" => "AAA",
            "email" => "BBB@gmail.com",
            "age" => 20,
            "gender" => 1,
            "favorite_music_age" => 1970,
            "favorite_artist" => "cccccc",
            "comment" => "dddddd"
        ]);
    }
}
