<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Song;

class AdminTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
     
    // public function test_admin_user_can_manage_songs()
    // {   
    //     // 管理者権限を持ったユーザーを１人作成する
    //     $user1 = factory(User::class)->create([
    //         "role" => 5,
    //     ]);
        
    //     // 管理者権限を持たないユーザーを１人作成する
    //     $user2 = factory(User::class)->create();
        
    //     // ユーザーはランダムで、曲を１曲投稿する
    //     $song = factory(Song::class)->create();
        
    //     // 管理者用の曲管理画面に移動する
    //     $response = $this->actingAs($user1)->get("index-for-admin");
    //     $response->assertStatus(200);
        
    //     // 管理者権限のないユーザーでは曲管理画面を表示できないことを確認する
    //     $response = $this->actingAs($user2)->get("index-for-admin");
    //     $response->assertStatus(302);
        
    //     // 作成した曲を削除する
    //     $response = $this->actingAs($user1)->get("delete/{$song->id}");
    //     $response->assertRedirect("index-for-admin");
        
    //     // 削除した曲を戻す
    //     $response = $this->actingAs($user1)->get("restore/{$song->id}");
    //     $response->assertRedirect("index-for-admin");
    // }
}
