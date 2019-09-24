<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSongRequest;
use App\Http\Requests\UpdateSongRequest;

use Illuminate\Support\Facades\Storage;

use App\User;
use App\Song;

class SongsController extends Controller
{   
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    
    public function index()
    {  
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $songs = $user->feed_songs()->orderBy("created_at", "desc")->paginate(5);

            $data = [
                "user" => $user,
                "songs" => $songs,
            ];
            $data += $this->counts($user);
        }
        return view("songs.index", $data);
    }
    
    public function create()
    {
        $user = \Auth::user();
        return view("songs.create", ["user" => $user]);
    }
    
    public function store(CreateSongRequest $request)
    {   
        $user = \Auth::user();
        
        $request->user()->songs()->create([
            "song_name" => $request->song_name,
            "artist_name" => $request->artist_name,
            "music_age" => $request->music_age,
            "description" => $request->description,
            "video_url" => $request->video_url,
        ]);
        
        return redirect("users/".$user->id);
    }
    
    public function show(Song $song)
    {
        $comments = $song->comments()->orderBy("created_at", "desc")->paginate(10);
        $user = \Auth::user();
        
        return view("songs.show",[
            "song" => $song,
            "comments" => $comments,
            "user" => $user,
        ]);
    }
    
    public function edit(Song $song)
    {
       return view("songs.edit",[
            "song" => $song,
        ]);
    }
    
    public function update(UpdateSongRequest $request, Song $song)
    {
        $song->song_name = $request->song_name;
        $song->artist_name = $request->artist_name;
        $song->music_age = $request->music_age;
        $song->description = $request->description;
        $song->video_url = $request->video_url;
        
        $song->save();
        
        return redirect("songs/".$song->id);
    }
    
    public function destroy(Song $song)
    {  
        $user = \Auth::user();
        
        if($user->id === $song->user_id){
            $song->delete();
        }
        
        return redirect("users/". $user->id);
    }
    
    // public function favoritesRanking(Request $request)
    // {    
    //     // 値を取得
    //     $music_age = $request->input("music_age");
        
    //     // 検索QUERY
    //     $query = Song::query();
        
    //     // もし「年代」が選択されていれば
    //     if(!empty($music_age))
    //     {
    //         $query->where("music_age", $music_age);
    //     }
        
    //     // ページネーション
    //     // $songs = $query->orderBy("created_at", "desc")->paginate(5);
    //     // $songs = Song::withCount("favorite_users")->where("music_age", $id)->orderBy("favorite_users_count", "desc")->paginate(20);
    //     $songs = $query->withCount("favorite_users")->orderBy("favorite_users_count", "desc")->paginate(5);
        
    //     $data = [
    //     "music_age" => $music_age,
    //     "songs" => $songs,
    //     ];
        
    //     return view("songs.favorites_ranking", $data);
    // }
    
    // public function commentsRanking(Request $request)
    // {   
    //     // 値を取得
    //     $music_age = $request->input("music_age");
        
    //     // 検索QUERY
    //     $query = Song::query();
        
    //     // もし「年代」が選択されていれば
    //     if(!empty($music_age))
    //     {
    //         $query->where("music_age", $music_age);
    //     }
        
    //     // ページネーション
    //     // $songs = $query->orderBy("created_at", "desc")->paginate(5);
        
    //     // $songs = Song::withCount("favorite_users")->where("music_age", $id)->orderBy("favorite_users_count", "desc")->paginate(20);
    //     $songs = $query->withCount("comments")->orderBy("comments_count", "desc")->paginate(5);
        
    //     $data = [
    
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
