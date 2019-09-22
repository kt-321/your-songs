<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;

class ResetPasswordTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
    use WithoutMiddleware;
     
    // パスワードリセットをリクエストする画面の閲覧可能
    public function test_user_can_view_reset_request()
    {
     $user = factory(User::class)->create();
     $response = $this->get(route("password.request", ["token" => $user->token]));
     $response->assertStatus(200);
    }
    
    
    // パスワードリセットのリクエスト成功
    public function test_valid_user_can_request_reset()
    {
     // ユーザーを1つ作成
     $user = factory(User::class)->create();
     // パスワードリセットをリクエスト
     $response = $this->from(route("password.request"))->post(route("password.email"), [
         "email" => $user->email,
     ]);
     // 同画面にリダイレクト
     $response->assertStatus(302);
     $response->assertRedirect(route("password.request"));
     }
     
     
    // 存在しないメールアドレスでパスワードリセットのリクエストをして失敗
    public function test_invalid_user_cannot_request_reset()
    {
     // ユーザーを1つ作成
     $user = factory(User::class)->create([
         "email" => "aaa@example.com"  
     ]);
      
     // 存在しないユーザーのメールアドレスでパスワードリセットをリクエスト
     $response = $this->from(route("password.request"))->post(route("password.email"), [
         "email" => "nobody@example.com"
     ]);
     
     // パスワードのリクエストに失敗し、パスワードリクエスト画面に戻る
     $response->assertStatus(302);
     $response->assertRedirect(route("password.request"));
    }
    
    
    // パスワードリセットのトークンでパスワードをリセット
     public function valid_user_can_reset_password()
     {
     Notification::fake();
     // ユーザーを1つ作成
     $user = factory(User::class)->create();
     // パスワードリセットをリクエスト
     $response = $this->post(route("password.email"), [
         "email" => $user->email
     ]);
     // トークンを取得
     $token = "";
     Notification::assertSentTo(
         $user,
         ResetPassword::class,
         function ($notification, $channels) use ($user, &$token) {
             $token = $notification->token;
             return true;
         }
     );
     // パスワードリセットの画面へ
     $response = $this->get(route("password.reset"), [
         $token => $notification->token
     ]);
     $response->assertStatus(200);
     
     // パスワードをリセット
     $new = "reset1111";
     $response = $this->post(route("password.reset"), [
         "email"                 => $user->email,
         "token"                 => $token,
         "password"              => $new,
         "password_confirmation" => $new
     ]);
     
     // ホームへ遷移
     $response->assertStatus(302);
     $response->assertRedirect(route("home"));
     
     // // リセット成功のメッセージ
     // $response->assertSessionHas("status", "パスワードはリセットされました!");
     
     // 認証されていることを確認
     $this->assertTrue(Auth::check());
     
     // 変更されたパスワードが保存されていることを確認
     $this->assertTrue(Hash::check($new, $user->fresh()->password));
     }
}
