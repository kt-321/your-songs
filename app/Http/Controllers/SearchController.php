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
        // 値を取得
        $song_name = $request->input("song_name");
        $artist_name = $request->input("artist_name");
        $music_age = $request->input("music_age");
        
        // 検索QUERY
        $query = Song::query();
        
        // もし「曲名」があれば
        if(!empty($song_name))
        {
            $query->where("song_name", "like", "%".$song_name. "%");
        }
        
        // もし「アーティスト名」があれば
        if(!empty($artist_name))
        {
            $query->where("artist_name", "like", "%".$artist_name. "%");
        }
        
        // もし「年代」が選択されていれば
        if(!empty($music_age))
        {
            $query->where("music_age", $music_age);
        }
        
        // ページネーション
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
        
        
        $data = [
        "song_name" => $song_name,
        "artist_name" => $artist_name,
        "music_age" => $music_age,
        "songs" => $songs,
        "recommended_songs" => $recommended_songs
        ];
        
        return view("search.index", $data);
        
    }
}
