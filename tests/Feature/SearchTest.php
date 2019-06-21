<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Song;

class SearchTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    
    use RefreshDatabase;
    
    // public function test_user_can_serch_for_song()
    // {
    //     // ユーザーを１人作成する
    //     $user = factory(User::class)->create();
        
    //     //曲を１０曲追加する
    //     factory(Song::class, 10)->create();
        
    //     // 曲の検索画面を表示
    //     $response = $this->actingAs($user)->get("/search");
    //     $response->assertStatus(200);
    // }
}
