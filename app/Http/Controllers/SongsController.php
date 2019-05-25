<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\User;

use App\Song;

class SongsController extends Controller
{
    public function index()
    {   
        $data = [];
        if(\Auth::check()) {
            $user = \Auth::user();
            // $songs = $user->feed_songs()->orderBy("created_at", "desc")->paginate(10);
            // $songs = Song::withCount("favorites")->orderBy("favorites_count", "desc")->paginate(20);
            // $songs = Song::withCount("favorites")->get();
            // $songs = Song::all();
            // $count = $songs->favoriteUsers()->count();
            $songs = Song::withCount("favorite_users")->orderBy("favorite_users_count", "desc")->paginate(20);
            
            $data = [
                "user" => $user,
                "songs" => $songs,
                // "count" => $count,
             ];
         }
        
        return view("welcome", $data);
    }
    
    public function create()
    {
        $user = \Auth::user();
        return view("songs.create", ["user" => $user]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            "song_name" => "required|max:191",
            "artist_name" => "required|max:191",
            "music_age" => "required|integer",
            "comment" => "nullable|max:191",
            "video_url" => "nullable|string",
        ]);
        
        $request->user()->songs()->create([
            "song_name" => $request->song_name,
            "artist_name" => $request->artist_name,
            "music_age" => $request->music_age,
            "comment" => $request->comment,
            "video_url" => $request->video_url,
        ]);
        
       return redirect("/");
    }
    
    
    public function edit($id)
    {
        $song = Song::find($id);
        
        return view("songs.edit",[
            "song" => $song,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $song = Song::find($id);
        
        $song->song_name = $request->song_name;
        $song->artist_name = $request->artist_name;
        $song->music_age = $request->music_age;
        $song->comment = $request->comment;
        $song->video_url = $request->video_url;
        
        $song->save();
        
        return redirect("/");
    }
    
    public function destroy($id)
    {
        $song = Song::find($id);
        
        if(\Auth::id() === $song->user_id){
            $song->delete();
        }
        
        return back();
    }
}
