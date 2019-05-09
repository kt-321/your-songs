<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Song;

class SongsController extends Controller
{
    public function index()
    {   
        $data = [];
        if(\Auth::check()) {
            $user = \Auth::user();
            $songs = $user->songs()->orderBy("created_at", "desc")->paginate(10);
            
            $data = [
                "user" => $user,
                "songs" => $songs,
             ];
         }
        
        return view("welcome", $data);
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            "song_name" => "required|max:191",
            "artist_name" => "required|max:191",
            "music_age" => "required|integer",
            "comment" => "nullable|max:191",
            "image_url" => "nullable|string",
            "video_url" => "nullable|string"
        ]);
        
        $request->user()->songs()->create([
            "song_name" => $request->song_name,
            "artist_name" => $request->artist_name,
            "music_age" => $request->music_age,
            "comment" => $request->comment,
            "image_url" => $request->image_url,
            "video_url" => $request->video_url,
        ]);
        
        return back();
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
