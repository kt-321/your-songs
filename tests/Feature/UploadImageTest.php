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

class UploadImageTest extends TestCase
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
        $response = $this->actingAs($user)->get("users/{$user->id}/images");
        $response->assertStatus(200);
    }
    
    public function test_user_can_upload_user_image()
    {
        //フェイクディスクの作成
        //storage/framework/testing/disks/designに保存用ディスクが作成される
        Storage::fake('avatars'); // テスト後ファイルは削除される
        // Storage::persistentFake('design'); テスト後も画像ファイルが残る

        // 画像アップロード用サービスクラス作成(僕はS3にアップロード)
        $imageService = new ImageService(new S3ImageUploader);

        // UploadedFileクラス用意
        $uploadedFile = UploadedFile::fake()->image('avatar.jpg');

        // 作成した画像を移動
        $uploadedFile->move('storage/framework/testing/avatars');

        // S3にアップロードする処理
        $imageService->upload($uploadedFile);

        // storage/framework/testing/disks/design内に該当ファイルが存在するか
        // S3にアップロードされたかはS3のバケットを確認しました。
        Storage::disk('avatars')->assertExists($uploadedFile->getFilename());
        
        // 画像アップロード後にマイページに戻る
        $response->assertRedirect("/users/{$user->id}");

    }
    
    public function test_user_can_see_song_image_upload_form()
    {
        // ユーザーを1人作成
        $user = factory(User::class)->create();
        
        // 曲を1つ作成
        $song = factory(Song::class)->create();
        
        // 曲画像のアップロード画面に移動する
        $response = $this->actingAs($user)->get("songs/{$song->id}/images");
        $response->assertStatus(200);
    }
    
    public function test_user_can_upload_song_image()
    {
        //フェイクディスクの作成
        //storage/framework/testing/disks/designに保存用ディスクが作成される
        Storage::fake('avatars'); // テスト後ファイルは削除される
        // Storage::persistentFake('design'); テスト後も画像ファイルが残る

        // 画像アップロード用サービスクラス作成(僕はS3にアップロード)
        $imageService = new ImageService(new S3ImageUploader);

        // UploadedFileクラス用意
        $uploadedFile = UploadedFile::fake()->image('avatar.jpg');

        // 作成した画像を移動
        $uploadedFile->move("storage/framework/testing/avatars");

        // S3にアップロードする処理
        $imageService->upload($uploadedFile);

        // storage/framework/testing/disks/design内に該当ファイルが存在するか
        // S3にアップロードされたかはS3のバケットを確認しました。
        Storage::disk('avatars')->assertExists($uploadedFile->getFilename());
        
        // 画像アップロード後にマイページに戻る
        $response->assertRedirect("/songs/{$song->id}");

    }
}

