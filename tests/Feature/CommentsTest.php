<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

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
    use WithoutMiddleware;
     
    public function test_user_can_post_comment()
    {
        // ユーザーを１人作成する
        $user = factory(User::class)->create();
        
        // 曲を１つ作成する
        $song = factory(Song::class)->create();
        
        // 曲にコメントを投稿する
        $response = $this->actingAs($user)->from('songs/{$song->id}')->post('comments', [
            "user_id" => $user->id,
            "song_id" => $song->id,
            "body" => "aaa",
        ]);
        
        // 同画面にリダイレクト
        $response->assertStatus(302);
        $response->assertRedirect('songs/{$song->id}');
    }
    
    public function test_user_can_delete_comment()
    {   
        // ユーザーを１人作成する
        $user = factory(User::class)->create();
        
        // 曲を１つ作成する
        $song = factory(Song::class)->create();
        
        //コメントを1つ作成する
        $comment = factory(Comment::class)->create([
            "user_id" => $user->id,
            "song_id" => $song->id,
        ]);
            
        // 自分が投稿したコメントを削除する
        $response = $this->actingAs($user)->from('songs/{$song->id}')->delete("comments/{$comment->id}");
           
        // 同画面にリダイレクト
        $response->assertStatus(302);
        $response->assertRedirect('songs/{$song->id}');
    }
}