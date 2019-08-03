<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;


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
     
    //  protected function setUp(): void
    // {
    //     parent::setUp();

    //     $user = factory(User::class)->create();
    // }
     
    public function test_admin_user_can_see_songs_index_for_admin()
    {
        //管理者権限を持ったユーザーを1人作成
        $user = factory(User::class)->create([
            "role" => "5"
        ]);
        
        //曲管理画面を表示する
        $response = $this->actingAs($user)->get(route("songs.indexForAdmin"));
        $response->assertStatus(200);
    }
    
    public function test_admin_user_can_delete_song()
    {
        //管理者権限を持ったユーザーを1人作成
        $user = factory(User::class)->create([
            "role" => "5"
        ]);
        
        //曲を一つ投稿する
         $song = factory(Song::class)->create();
        
        //曲を削除する
        $response = $this->actingAs($user)->get(route("songs.delete"), [
            "id" => $song->id,
        ]);
        
        //曲管理画面に移動する
        $response->assertStatus(302);
        $response->assertRedirect(route("songs.indexForAdmin"));
    }
    
    public function test_admin_user_can_restore_deleted_song()
    {
        //管理者権限を持ったユーザーを1人作成
        $user = factory(User::class)->create([
            "role" => "5"
        ]);
        
        //曲を投稿する
         $song = factory(Song::class)->create();
        
       //曲を削除する
        // $response = $this->actingAs($user)->get("delete/{$song->id}");
        $response = $this->actingAs($user)->get(route("songs.delete"), [
            "id" => $song->id,
        ]);
        $response->assertStatus(302);
        
        //曲管理画面に移動する
        $response->assertRedirect(route("songs.indexForAdmin"));
        
        //削除した曲を復活させる
        $response = $this->actingAs($user)->get(route("songs.restore"), [
            "id" => $song->id
        ]);
        
        //曲管理画面に移動する
        $response->assertStatus(302);
        $response->assertRedirect(route("songs.indexForAdmin"));
    }
    
    public function test_admin_user_can_force_delete_song()
    {
        // 管理者権限を持ったユーザーを1人作成
        $user = factory(User::class)->create([
            "role" => "5"
        ]);
        
        //曲を投稿する
         $song = factory(Song::class)->create();
        
        //曲を削除する
        // $response = $this->actingAs($user)->get("delete/{$song->id}");
        $response = $this->actingAs($user)->get(route("songs.delete"), [
            "id" => $song->id,
        ]);
        $response->assertStatus(302);
        
        //曲管理画面に移動する
        $response->assertRedirect(route("songs.indexForAdmin"));
        
        //曲を完全に削除する
        $response = $this->actingAs($user)->get(route("songs.forceDelete"), [
            "id" => $song->id
        ]);
        
        //曲管理画面に移動する
        $response->assertStatus(302);
        $response->assertRedirect(route("songs.indexForAdmin"));
    }
    
    public function test_not_admin_user_can_not_see_songs_index_for_admin()
    {
        //管理者権限を持たないユーザーを1人作成
        $user = factory(User::class)->create();
        
        //曲管理画面を表示できない
        $response = $this->actingAs($user)->get(route("songs.indexForAdmin"));
        $response->assertStatus(403);
    }
    
    public function test_not_admin_user_can_not_delete_song()
    {
        //管理者権限を持たないユーザーを1人作成
        $user= factory(User::class)->create();
        
        //曲を投稿する
         $song = factory(Song::class)->create();
        
        //曲を削除する
        $response = $this->actingAs($user)->get(route("songs.delete"), [
            "id" => $song->id,
        ]);
        $response->assertStatus(403);
    }
    
    public function test_not_admin_user_can_not_restore_deleted_song()
    {
        // 管理者権限を持たないユーザーを1人作成
        $user1 = factory(User::class)->create();
        
        // 管理者権限を持ったユーザーを1人作成
        $user2 = factory(User::class)->create([
            "role" => "5"
        ]);
        
        // 曲を1つ作成する
        $song = factory(Song::class)->create();
        
        // 管理者権限を持ったユーザー曲を削除する
        // $response = $this->actingAs($user2)->get("delete/{$song->id}");
        $response = $this->actingAs($user2)->get(route("songs.delete"), [
            "id" => $song->id,
        ]);
        $response->assertStatus(302);
        
        // 管理者権限を持たないユーザーは削除済みの曲を復活させることができない
        $response = $this->actingAs($user1)->get(route("songs.restore"), [
            "id" => $song->id,
        ]);
        $response->assertStatus(403);
    }
    
    public function test_not_admin_user_can_not_force_delete_song()
    {   
        // 管理者権限を持たないユーザーを1人作成
        $user1 = factory(User::class)->create();
        
        // 管理者権限を持ったユーザーを1人作成
        $user2 = factory(User::class)->create([
            "role" => "5"
        ]);
        
        // 曲を投稿する
         $song = factory(Song::class)->create();
        
        // 管理者権限を持ったユーザーが曲を削除する
        $response = $this->actingAs($user2)->get(route("songs.delete"), [
            "id" => $song->id,
        ]);
        $response->assertStatus(302);
        
        // 管理者権限を持たないユーザーは削除済みの曲を完全に削除することができない
        // $response = $this->actingAs($user1)->get("force-delete/{$song->id}");
        $response = $this->actingAs($user1)->get(route("songs.forceDelete"), [
            "id" => $song->id,
        ]);
        $response->assertStatus(403);
    }
}