<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class UserImagesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use RefreshDatabase; 
     
    // public function test_user_can_upload_image()
    // {   
    //     // ユーザーを１人作成する
    //     $user = factory(User::class)->create();
        
    //     // アイコン設定画面を表示する
    //     $response = $this->actingAs($user)->get("/users/{$user->id}/userImages");
        //   $response->assertStatus(200);
           
    //     // アイコンとして画像をアップロードする
    //     $response = $this->actingAs($user)->post("/users/{$user->id}/userImages");
        
    //     // 画像アップロード後にマイページに戻る
    //     $response->assertRedirect("/users/{$user->id}");
    // }
}
