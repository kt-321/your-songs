<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;

use Auth;

class RegisterTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;
    use WithoutMiddleware;
    
    public function test_user_can_see_signup_page()
    {
        //曲の投稿画面を表示する
        $response = $this->get("songs/create");
        $response->assertStatus(200);
    }
    
    public function test_request_should_pass_when_data_is_provided()
    {   
        // ユーザー登録画面を表示
        $response = $this->get("signup");
        $response->assertStatus(200);
        
        // ユーザー登録
        $response = $this->post("signup",[
            "name" => "aaa",
            "email" => "bbb@gmail.com",
            "password" => "cccccc",
            "password_confirmation" => "cccccc"
        ]);
        
        // ユーザー登録後、トップページにページ移動
        $response->assertStatus(302);
        $response->assertRedirect("/home");
        
        // データベースのusersテーブルに追加されていることを確認
        $this->assertDatabaseHas('users', [
            "name" => "aaa",
            "email" => "bbb@gmail.com",
            "password" => bcrypt("cccccc"),
        ]);
    }
    
    public function test_request_should_fail_when_no_name_is_provided()
    {   
        // ユーザー登録画面を表示
        $response = $this->get("signup");
        $response->assertStatus(200);
        
        // ユーザー名を空白の状態でユーザー登録
        $response = $this->from("signup")->post("signup",[
            "name" => "",
            "email" => "bbb@gmail.com",
            "password" => "cccccc",
            "password_confirmation" => "cccccc",
        ]);
        
        // ユーザー登録に失敗し、同画面に戻る
        $response->assertStatus(404);
        $response->assertJsonValidationErrors("name");
        $response->assertRedirect("signup");
    }
    
    public function test_request_should_fail_when_no_email_is_provided()
    {   
        // ユーザー登録画面を表示
        $response = $this->get("signup");
        $response->assertStatus(200);
        
        // メールアドレスを空白の状態でユーザー登録
        $response = $this->from("signup")->post("signup",[
            "name" => "aaa",
            "email" => "",
            "password" => "cccccc",
            "password_confirmation" => "cccccc"
        ]);
        
        // ユーザー登録に失敗し、同画面に戻る
        $response->assertStatus(404);
        $response->assertJsonValidationErrors("email");
        $response->assertRedirect("signup");
    }
    
    public function test_request_should_fail_when_no_password_is_provided()
    {   
        // ユーザー登録画面を表示
        $response = $this->get("signup");
        $response->assertStatus(200);
        
        // ユーザー登録
        $response = $this->post("signup",[
            "name" => "aaa",
            "email" => "bbb@gmail.com",
            "password" => "",
            "password_confirmation" => "",
        ]);
        
        // ユーザー登録に失敗し、同画面に戻る
        $response->assertStatus(404);
        $response->assertJsonValidationErrors("email");
        $response->assertRedirect("signup");
    }
    
    public function test_request_should_fail_when_password_doesnot_match_password_confirmation()
    {   
        // ユーザー登録画面を表示
        $response = $this->get("signup");
        $response->assertStatus(200);
        
        // ユーザー登録
        $response = $this->post("signup",[
            "name" => "aaa",
            "email" => "bbb@gmail.com",
            "password" => "cccccc",
            "password_confirmation" => "dddddd"
        ]);
        
        // ユーザー登録に失敗し、同画面に戻る
        $response->assertStatus(404);
        $response->assertJsonValidationErrors("email");
        $response->assertRedirect("signup");
    }
}