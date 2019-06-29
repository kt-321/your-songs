<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Song;
use App\User;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input("keyword");
        
        $query = Song::query();
        
        if(!empty($keyword))
        {
            $query->where("song_name", "like", "%".$keyword. "%")->orwhere("artist_name", "like", "%".$keyword. "%");
        }
        
        $songs = $query->orderBy("created_at", "desc")->paginate(5);
        
        $favorite_music_age = \Auth::user()->favorite_music_age;
        $favorite_artist = \Auth::user()->favorite_artist;
        
        // 「曲の年代がユーザーの好きな音楽の年代と一致」または「アーティスト名がユーザーの好きなアーティスト名と部分一致」
        // である曲をユーザーへのおすすめ曲とする。
        $recommended_songs = Song::where("music_age", $favorite_music_age)
        ->orWhere("artist_name", "like", "%".$favorite_artist. "%")
        ->inRandomOrder()
        ->limit(12)
        ->get();
        
        //  $recommended_songs = Song::where("user_id" ,\Auth::user()->id)
        // ->where(function($query){
        //     $query->where("music_age", $favorite_music_age)
        //         ->orWhere("artist_name", "like", "%".$favorite_artist. "%");
        // })
        // ->get();
        
        // $data = [
        //     "songs" => $songs,
        //     "keyword" => $keyword,
        //     "recommended_songs" => $recommended_songs,
        // ];
        
        // $data += $this->counts($recommended_songs);
        
        return view("search.index",[
            "songs" => $songs,
            "keyword" => $keyword,
            "recommended_songs" => $recommended_songs,
            ]);
            
        // return view("search.index", $data);
        
    }
}
