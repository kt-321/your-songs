<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Song;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        // 値を取得
        $name = $request->input("name");
        $age = $request->input("age");
        $gender = $request->input("gender");
        
        // 検索QUERY
        $query = User::query();
        
        // もし「名前」があれば
        if(!empty($name))
        {
            $query->where("name", "like", "%".$name. "%");
        }
        
        // もし「年齢」が選択されていれば
        if(!empty($age))
        {
            $query->where("age", "like", "%".$age. "%");
        }
        
        // もし「性別」が選択されていれば
        if(!empty($gender))
        {
            $query->where("gender", $gender);
        }
        
        // ページネーション
        $users = $query->orderBy("created_at", "desc")->paginate(10);
        
        $favorite_music_age = \Auth::user()->favorite_music_age;
        $favorite_artist = \Auth::user()->favorite_artist;
        
        // 「好きな曲の年代がログイン中ユーザーのそれと一致」または「好きなアーティストがログイン中ユーザーのそれと部分一致」
        // であるユーザーをログイン中ユーザーへの「音楽の趣味が合いそうなユーザー」とする。
        $recommended_users = User::where("favorite_music_age", $favorite_music_age)
        ->orWhere("favorite_artist", "like", "%".$favorite_artist. "%")
        ->inRandomOrder()
        ->limit(12)
        ->get();
    
        $data = [
        "name" => $name,
        "age" => $age,
        "gender" => $gender,
        "users" => $users,
        "recommended_users" => $recommended_users,
        ];
        
        return view("users.index", $data);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $songs = $user->songs()->orderBy("created_at", "desc")->paginate(10);
        
        $data = [
            "user" => $user,
            "songs" => $songs,
        ];
        
        $data += $this->counts($user);
        
        return view("users.show", $data);
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        
        return view("users.edit", ["user" => $user]);
    }
    
    public function update(Request $request, $id)
    {   
        $request->validate([
            "name" => "required|string|max:15",
            "email" => "required|string|email|max:30|unique:users,email,$id",
            "age" => "nullable|integer",
            "gender" => "nullable|string",
            "favorite_music_age" => "nullable|integer",
            "favorite_artist" => "nullable|string|max:20",
            "comment" => "nullable|string|max:150"
        ]);
        
        $user = User::find($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->favorite_music_age = $request->favorite_music_age;
        $user->favorite_artist = $request->favorite_artist;
        $user->comment = $request->comment;
        
        $user->save();
        
        return redirect()->route("users.show", ["id" => $user->id]);
    }
    
    public function timeline()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $songs = $user->feed_songs()->orderBy("created_at", "desc")->paginate(10);

            $data = [
                "user" => $user,
                "songs" => $songs,
            ];
            $data += $this->counts($user);
        }
        return view("users.timeline", $data);
    }
    
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);
        
        $data = [
            "user" => $user,
            "users" => $followings,
        ];
        
        $data += $this->counts($user);
        
        return view("users.followings", $data);
    }
    
    public function followers($id)
    {
        $user = User::find($id);
        $followers = $user->followers()->paginate(10);
        
        $data = [
            "user" => $user,
            "users" => $followers,
        ];
        
        $data += $this->counts($user);
        
        return view("users.followers", $data);
    }
    
    public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites()->paginate(10);
        
        $data = [
            "user" => $user,
            "songs" => $favorites,
        ];
        
        $data +=$this->counts($user);
        
        return view("users.favorites", $data);
    }
}
