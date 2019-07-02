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
            $songs = Song::orderBy("created_at", "desc")->paginate(20);
            $data = [
            "songs" => $songs,
            ];}
        
        return view("songs.index", $data);
    }
    
    public function create()
    {
        $user = \Auth::user();
        return view("songs.create", ["user" => $user]);
    }
    
    public function store(Request $request)
    {   
        $user = \Auth::user();
        
        $this->validate($request,[
            "song_name" => "required|max:15",
            "artist_name" => "required|max:15",
            "music_age" => "required|integer",
            "description" => "nullable|max:200",
            "video_url" => "nullable|string|max:200",
        ]);
        
        $request->user()->songs()->create([
            "song_name" => $request->song_name,
            "artist_name" => $request->artist_name,
            "music_age" => $request->music_age,
            "description" => $request->description,
            "video_url" => $request->video_url,
        ]);
        
        return redirect()->route("users.show", ['id' => $user->id]);
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
        
        return redirect()->route('songs.show', ['id' => $song->id]);
    }
    
   
    public function destroy($id)
    {  
        $user = User::find(auth()->id());
        $song = Song::find($id);
        
        if(\Auth::id() === $song->user_id){
            $song->delete();
        }
        
        return redirect()->route('users.show', ['id' => $user->id]);
    }
    
    
    public function favoritesRankingAll()
    {    
        $songs = Song::withCount("favorite_users")->orderBy("favorite_users_count", "desc")->paginate(20);
        
        return view("songs.favorites_ranking", ["songs" => $songs]);
    }
    
    public function favoritesRanking($id)
    {    
        $songs = Song::withCount("favorite_users")->where("music_age", $id)->orderBy("favorite_users_count", "desc")->paginate(20);
        
        return view("songs.favorites_ranking", ["songs" => $songs]);
    }
    
     public function commentsRankingAll()
    {    
        $songs = Song::withCount("comments")->orderBy("comments_count", "desc")->paginate(20);
            
        return view("songs.comments_ranking", ["songs" => $songs]);
    } 
    
    public function commentsRanking($id)
    {    
        $songs = Song::withCount("comments")->where("music_age", $id)->orderBy("comments_count", "desc")->paginate(20);
            
        return view("songs.comments_ranking", ["songs" => $songs]);
    }
    
    public function indexForAdmin()
    {   
        $songs = Song::all(); 
        $deleted = Song::onlyTrashed()->get(); 
    
        return view("songs.index_for_admin", [
            "songs" => $songs,
            "deleted" => $deleted,
        ]);
    }
    
    public function delete($id)
    {
        Song::find($id)->delete();
        return redirect()->route("songs.indexForAdmin");
    }
    
    public function restore($id)
    {
        Song::onlyTrashed()->find($id)->restore();
        return redirect()->route("songs.indexForAdmin");
    }
    
    public function forceDelete($id)
    {
        Song::onlyTrashed()->find($id)->forceDelete();
        return redirect()->route("songs.indexForAdmin");
    }
}
