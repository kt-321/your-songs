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
        
        $songs = $query->orderBy("created_at", "desc")->paginate(10);
        
        return view("search.index",[
            "songs" => $songs,
            "keyword" => $keyword,
            ]);
        
    }
}
