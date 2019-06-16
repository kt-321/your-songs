<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Song extends Model
{   
    use SoftDeletes;
     
    protected $fillable = ["description", "user_id", "image_url", "video_url", "artist_name", "song_name", "music_age"];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, "favorites", "song_id", "user_id");
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
