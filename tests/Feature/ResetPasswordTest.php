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
     $response = $this->get('password/reset');
     $response->assertStatus(200);
    }
    
    
    // パスワードリセットのリクエスト成功
    public function test_valid_user_can_request_reset()
    {
     // ユーザーを1つ作成
     $user = factory(User::class)->create();
     // パスワードリセットをリクエスト
     $response = $this->from('password/email')->post('password/email', [
         'email' => $user->email,
     ]);
     // 同画面にリダイレクト
     $response->assertStatus(302);
     $response->assertRedirect('password/email');
     // 成功のメッセージ
     $response->assertSessionHas('status',
         'パスワード再設定用メールを送信しました。');
     }
     
     
    // 存在しないメールアドレスでパスワードリセットのリクエストをして失敗
    public function test_invalid_user_cannot_request_reset()
    {
     // ユーザーを1つ作成
     $user = factory(User::class)->create();
     // 存在しないユーザーのメールアドレスでパスワードリセットをリクエスト
     $response = $this->from('password/email')->post('password/email', [
         'email' => 'nobody@example.com'
     ]);
     $response->assertStatus(302);
     $response->assertRedirect('password/email');
     // 失敗のエラーメッセージ
     $response->assertSessionHasErrors('email',
         'このメールアドレスに一致するユーザーを見つけることが出来ませんでした。');
    }
    
    
    // パスワードリセットのトークンでパスワードをリセット
     public function valid_user_can_reset_password()
     {
     Notification::fake();
     // ユーザーを1つ作成
     $user = factory(User::class)->create();
     // パスワードリセットをリクエスト
     $response = $this->post('password/email', [
         'email' => $user->email
     ]);
     // トークンを取得
     $token = '';
     Notification::assertSentTo(
         $user,
         ResetPassword::class,
         function ($notification, $channels) use ($user, &$token) {
             $token = $notification->token;
             return true;
         }
     );
     // パスワードリセットの画面へ
     $response = $this->get('password/reset/'.$token);
     $response->assertStatus(200);
     // パスワードをリセット
     $new = 'reset1111';
     $response = $this->post('password/reset', [
         'email'                 => $user->email,
         'token'                 => $token,
         'password'              => $new,
         'password_confirmation' => $new
     ]);
     // ホームへ遷移
     $response->assertStatus(302);
     $response->assertRedirect('/home');
     // リセット成功のメッセージ
     $response->assertSessionHas('status', 'パスワードはリセットされました!');
     // 認証されていることを確認
     $this->assertTrue(Auth::check());
     // 変更されたパスワードが保存されていることを確認
     $this->assertTrue(Hash::check($new, $user->fresh()->password));
     }
}
