<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Song;

class HelloTest extends TestCase
{   
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
    
    public function testExample()
    {
        $this->assertTrue(true);
        
        $response = $this->get("/");
        $response->assertStatus(200);
        
        $response = $this->get("/signup");
        $response->assertStatus(200);
        
        $response = $this -> get("/users");
        $response->assertStatus(302);
        
        $response = $this -> get("/users/{id}");
        $response->assertStatus(302);
        
        $response = $this -> get("/users/{id}/edit");
        $response->assertStatus(302);
        
        $response = $this -> get("/users/{id}/followings");
        $response->assertStatus(302);
        
        $response = $this -> get("/users/{id}/followers");
        $response->assertStatus(302);
        
        $response = $this -> get("/users/{id}/favorites");
        $response->assertStatus(302);
        
        $response = $this -> get("/users/{id}/userImages");
        $response->assertStatus(302);
        
        $response = $this->get("/songs/{id}");
        $response->assertStatus(302); 
        
        $response = $this->get("/songs/create");
        $response->assertStatus(302); 
        
        $response = $this->get("/songs/{id}/edit");
        $response->assertStatus(302); 
        
        $response = $this->get("/songs/{id}/songImages");
        $response->assertStatus(302); 
        
        $response = $this->get("/search");
        $response->assertStatus(302); 
        
        $response = $this->get("/favoritesRanking/all");
        $response->assertStatus(302);
       
        $response = $this->get("/favoritesRanking/1970");
        $response->assertStatus(302);
        
        $response = $this->get("/favoritesRanking/1980");
        $response->assertStatus(302);
        
        $response = $this->get("/favoritesRanking/1990");
        $response->assertStatus(302);
        
        $response = $this->get("/favoritesRanking/2000");
        $response->assertStatus(302); 
        
        $response = $this->get("/favoritesRanking/2010");
        $response->assertStatus(302); 
        
        $response = $this->get("/commentsRanking/all");
        $response->assertStatus(302);
       
        $response = $this->get("/commentsRanking/1970");
        $response->assertStatus(302);
        
        $response = $this->get("/commentsRanking/1980");
        $response->assertStatus(302);
        
        $response = $this->get("/commentsRanking/1990");
        $response->assertStatus(302);
        
        $response = $this->get("/commentsRanking/2000");
        $response->assertStatus(302); 
        
        $response = $this->get("/commentsRanking/2010");
        $response->assertStatus(302); 
        
        
        
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get("/");
        $response->assertStatus(200);
        
        $response = $this->actingAs($user)->get("/signup");
        $response->assertStatus(302);
        
        $response = $this->actingAs($user)->get("/login");
        $response->assertStatus(302);
        
        // $response = $this->actingAs($user)->get("/users");
        // $response->assertStatus(200);
        
        $response = $this->actingAs($user)->get("/users/{$user->id}");
        $response->assertStatus(200);
        
        $response = $this->actingAs($user)->get("/users/{$user->id}/edit");
        $response->assertStatus(200);
        
        $response = $this->actingAs($user)->get("/users/{$user->id}/followings");
        $response->assertStatus(200);
        
        $response = $this->actingAs($user)->get("/users/{$user->id}/followers");
        $response->assertStatus(200);
        
        $response = $this->actingAs($user)->get("/users/{$user->id}/favorites");
        $response->assertStatus(200);
        
        $response = $this -> actingAs($user) -> get("/users/{$user->id}/userImages");
        $response->assertStatus(200);
        

        $song = factory(Song::class)->create();
        $response = $this->actingAs($user)->get("/songs/{$song->id}");
        $response->assertStatus(200); 
        
        $response = $this->actingAs($user)->get("/songs/create");
        $response->assertStatus(200); 
        
        $response = $this->actingAs($user)->get("/songs/{$song->id}/edit");
        $response->assertStatus(200); 
        
        $response = $this->actingAs($user)->get("/songs/{$song->id}/songImages");
        $response->assertStatus(200); 
        
        $response = $this->actingAs($user)->get("/search");
        $response->assertStatus(200); 
        
        $response = $this->actingAs($user)->get("/favoritesRanking/all");
        $response->assertStatus(200);
       
        $response = $this->actingAs($user)->get("/favoritesRanking/1970");
        $response->assertStatus(200);
        
        $response = $this->actingAs($user)->get("/favoritesRanking/1980");
        $response->assertStatus(200);
        
        $response = $this->actingAs($user)->get("/favoritesRanking/1990");
        $response->assertStatus(200);
        
        $response = $this->actingAs($user)->get("/favoritesRanking/2000");
        $response->assertStatus(200); 
        
        $response = $this->actingAs($user)->get("/favoritesRanking/2010");
        $response->assertStatus(200); 
        
        $response = $this->actingAs($user)->get("/commentsRanking/all");
        $response->assertStatus(200);
       
        $response = $this->actingAs($user)->get("/commentsRanking/1970");
        $response->assertStatus(200);
        
        $response = $this->actingAs($user)->get("/commentsRanking/1980");
        $response->assertStatus(200);
        
        $response = $this->actingAs($user)->get("/commentsRanking/1990");
        $response->assertStatus(200);
        
        $response = $this->actingAs($user)->get("/commentsRanking/2000");
        $response->assertStatus(200); 
        
        $response = $this->actingAs($user)->get("/commentsRanking/2010");
        $response->assertStatus(200); 
        
       
        // ダミーで利用するデータ
        factory(User::class)->create([
            "name" => "AAA",
            "email" => "BBB@CCC.COM",
            "age" => 10,
            "gender" => 1,
        ]);
        factory(User::class, 10)->create();
        
        $this->assertDatabaseHas("users", [
            "name" => "AAA",
            "email" => "BBB@CCC.COM",
            "age" => 10,
            "gender" => 1,
        ]);
        
        
        // ダミーで利用するデータ
        factory(Song::class)->create([
            "song_name" => "DDD",
            "artist_name" => "EEE",
            "music_age" => "1970",
        ]);
        factory(Song::class, 10)->create();
        
        $this->assertDatabaseHas("songs",[
            "song_name" => "DDD",
            "artist_name" => "EEE",
            "music_age" => "1970",
        ]);
    }
    
    
    // public function logout()
    // {
    //     $this->assertTrue(true);
    
    //     $user = factory(User::class)->create();
        
    //     $this->actingAs($user);
        
    //     $this->assertTrue(Auth::check());
        
    //     $response = $this->post("logout");
        
    //     $this->assertFalse(Auth::check());
        
    //     $response->assertRedirect("/");
    // }
    
    // public function login()
    // {
    //     $user = factory(User::class)->create([
    //         'password'  => bcrypt('test1111')
    //     ]);
        
    //     // まだ認証されていない
    //     $this->assertFalse(Auth::check());
        
    //     // ログイン実行
    //     $response = $this->post("login", [
    //         "email" => $user->email,
    //         "password" => "test1111",
    //     ]);
        
    //     // 認証されている
    //     $this->assertTrue(Auth::check());
        
    //     // ログイン後にトップページへリダイレクト
    //     $reponse->assertRedirect("/");
    // }
    
    // public function setUp()
    // {
    //     dd(env('APP_ENV'), env('DB_HOST'));
    //     parent::setUp();
    // }
}
