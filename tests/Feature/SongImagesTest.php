<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Song;

class SongImagesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
    
    // public function testExample()
    // {
    //     // ユーザーを１人作成する
    //     $user = factory(User::class)->create();
        
    //     // 曲を投稿する
    //     $song =
        
    //     // 曲の画像設定画面を表示する
    //     $response = $this->actingAs($user)->get("/songs/{$song->id}/songImages");
        //   $response->assertStatus(200);
        
    //     // 曲の画像をアップロードする
    //     $response = $this->actingAs($user)->post("/songs/{$song->id}/songImages");
        
    //     // 画像アップロード後に曲の詳細画面に戻る
    //     $response->assertRedirect("/songs/{$song->id}");
    // }
}
