<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSongRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "song_name" => "required|max:15",
            "artist_name" => "required|max:15",
            "music_age" => "required|integer",
            "description" => "nullable|max:200",
            "video_url" => "nullable|string|max:200",
        ];
    }
    
    public function attributes()
    {
        return [
            "song_name" => "タイトル",
            "artist_name" => "アーティスト名",
            "music_age" => "年代",
            "description" => "曲の説明",
            "video_url" => "映像のURL",
        ];
    }
}
