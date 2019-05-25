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
    
    // public function favorite_users()
    // {
    //     return $this->belongsToMany(User::class, "favorites", "song_id", "user_id")->withTimestamps;
    // }
    
    public function favorite_users()
    {
        return $this->belongsToMany(User::class, "favorites", "song_id", "user_id");
        // $songs = Song::withCount("favorites")->get();
        // foreach ($songs as $song){
        //     return $post->favorites_count;
        // }
        
        // $songs = Song::withCount("favorites")->orderBy("favorites_count", "desc")->paginate(20);
    }
    
}
