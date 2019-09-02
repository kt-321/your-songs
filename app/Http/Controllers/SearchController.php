<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Song;
use App\User;

use Auth;

use JavaScript;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // 値を取得
        $song_name = $request->input("song_name");
        $artist_name = $request->input("artist_name");
        $music_age = $request->input("music_age");
        $order = $request->input("order");
        
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
        
        // 「投稿が新しい順」が選択されていれば
        if($order == "created_at")
        {
            $query->orderBy("created_at", "desc");
            // $songs = $query->orderBy("created_at", "desc")->paginate(5);
        }elseif($order == "favorites_ranking")
        // 「お気に入りが多い順」が選択されていれば、
        {
            $query->withCount("favorite_users")->orderBy("favorite_users_count", "desc");
        }elseif($order == "comments_ranking")
        // 「コメントが多い順」が選択されていれば、
        {
            $query->withCount("comments")->orderBy("comments_count", "desc");
        }
        
        // ページネーション
        $songs = $query->paginate(6);
        
        
        
        if(Auth::check())
        {
            $favorite_music_age = \Auth::user()->favorite_music_age;
            $favorite_artist = \Auth::user()->favorite_artist;
            
            $recommended_songs = Song::where("user_id","<>", \Auth::id())
            ->where(function($query)use($favorite_music_age, $favorite_artist){
                $query->where("music_age", $favorite_music_age)
                ->orWhere("artist_name", "like", "%".$favorite_artist. "%");
            })
            ->inRandomOrder()
            ->limit(12)
            ->get();
        
        
            $data = [
            "song_name" => $song_name,
            "artist_name" => $artist_name,
            "music_age" => $music_age,
            "order" => $order,
            "songs" => $songs,
            "recommended_songs" => $recommended_songs
            ];
        }
        else
        {
            $data = [
            "song_name" => $song_name,
            "artist_name" => $artist_name,
            "music_age" => $music_age,
            "order" => $order,
            "songs" => $songs,
            ];
        }
        
        
        return view("search.index", $data);

    }
}
