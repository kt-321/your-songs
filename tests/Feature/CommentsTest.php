<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Song;
use App\Comment;

class CommentsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
     
    // public function test_user_can_post_comment()
    // {
    //     // ユーザーを１人作成する
    //     $user = factory(User::class)->create();
        
    //     // 曲にコメントを投稿する
    //     $response = $this->actingAs($user)->post("/comments");
        
    //     // 曲にコメントを投稿後に曲の詳細画面に戻ることを確認
    //     $response->assertRedirect("/songs/{$song->id}");
            
    //     // 自分が投稿したコメントを削除する
    //     $response = $this->actingAs($user)->delete("comments/{$comment->id}");
           
    //     // 一つ前の画面に戻る
    //     $response->assertRedirect();
    // }
    
    // public function test_user_can_delete_comment()
    // {   
    //     // ユーザーを１人作成する
    //     $user = factory(User::class)->create();
        
    //     // 作成したユーザーでコメントを１件投稿する
    //     $comment = factory(Comment::class)->create([
    //         "user_id" => $user->id, 
    //         "song_id" => $song->id,
    //     ]);
        
    //     // 自分が投稿したコメントを削除する
    //     $response = $this->actingAs($user)->delete("comments/{$comment->id}");
        
    //     // １つ前の画面に戻る
    //     $response->assertRedirect();
    // }
}
