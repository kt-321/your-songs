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
            $songs = Song::withCount("favorite_users")->orderBy("favorite_users_count", "desc")->paginate(20);
            
            $data = [
                "user" => $user,
                "songs" => $songs,
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
            "description" => "nullable|max:191",
            "video_url" => "nullable|string|max:191",
        ]);
        
        $request->user()->songs()->create([
            "song_name" => $request->song_name,
            "artist_name" => $request->artist_name,
            "music_age" => $request->music_age,
            "description" => $request->description,
            "video_url" => $request->video_url,
        ]);
        
       return redirect("/");
    }
    
    public function show($id)
    {
        $song = Song::find($id);
        $comments = $song->comments()->orderBy("created_at", "desc")->paginate(10);
        $user = \Auth::user();
        
        return view("songs.show",[
            "song" => $song,
            "comments" => $comments,
            "user" => $user,
        ]);
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
        $song->description = $request->description;
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
