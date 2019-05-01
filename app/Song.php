<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ["comment" , "user_id", "image_url", "video_url", "artist_name", "song_name", "music_age"];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
