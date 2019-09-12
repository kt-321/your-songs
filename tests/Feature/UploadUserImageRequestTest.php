<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

use App\User;
use App\Song;

class UploadUserImageRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     
    use RefreshDatabase;
    use WithoutMiddleware;
    
    public function test_user_can_see_user_image_upload_form()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        // ユーザー画像のアップロード画面に移動する
        $response = $this->actingAs($user)->get(route("users.userImages", ["id" => $user->id]));
        $response->assertStatus(200);
    }
    
    public function test_upload_user_image_request_should_pass_when_file_is_provided()
    {   
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        //フェイクディスクの作成
        //storage/framework/testing/disks/avatarsに保存用ディスクが作成される
        // Storage::fake('avatar'); // テスト後ファイルは削除される

        // 画像アップロード用サービスクラス作成(僕はS3にアップロード)
        // $imageService = new ImageService(new S3ImageUploader);

        // UploadedFileクラス用意
        $uploadedFile = UploadedFile::fake()->image("avatar.jpg");

        // 作成した画像を移動
        // $uploadedFile->move('storage/framework/testing/avatars');

        // S3にアップロードする処理
        // $imageService->upload($uploadedFile);
        
        //画像をアップロードする
        $response = $this->actingAs($user)->post(route("users.userImagesUpload", ["id" => $user->id]),[
            "file" => $uploadedFile,
        ]);
        
        // ユーザー画像をアップロード後にマイページに戻る
        $response->assertRedirect(route("users.show", ["id" => $user->id]));
        
        // S3にアップロードされたかはS3のバケットを確認しました。
        
        
        
        // $path = Storage::disk("s3")->putFile("/", $uploadedFile, "public");
        // $url = Storage::disk("s3")->url($path);
        
        // storage/framework/testing/disks/design内に該当ファイルが存在するか
        // S3にアップロードされたかはS3のバケットを確認しました。
        // Storage::disk('avatars')->assertExists($uploadedFile->getFilename());
        // Storage::disk('s3')->assertExists($uploadedFile->getFilename());
        
        // dd($url);
        
        // $response = $this->actingAs($user)->get($url);
        // dd($response);
        
        // $response->assertStatus(200);
        
    }
    
    public function test_upoad_user_image_request_should_fail_when_no_file_is_provided()
    {   
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        //画像のアップロードを試みる
        $response = $this->actingAs($user)->from(route("users.userImages", ["id" => $user->id]))->post(route("users.userImagesUpload", ["id" => $user->id]),[
            "file" => "",
        ]);
        
        // アップロードに失敗し、ユーザー画像のアップロード画面が表示される
        $response->assertStatus(302);
        $response->assertRedirect(route("users.userImages", ["id" => $user->id]));
        
        // S3にアップロードされていないことをS3のバケットにて確認しました。
    }
}
