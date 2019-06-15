<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Song;

class UsersController extends Controller
{
    
    public function index()
    {
        $users = User::orderBy("id", "desc")->paginate(10);
        
        return view("users.index", [
            "users" => $users,    
        ]);
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
        $user = User::find($id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->favorite_music_age = $request->favorite_music_age;
        $user->favorite_artist = $request->favorite_artist;
        $user->comment = $request->comment;
        
        $user->save();
        
        return redirect("/");
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
    
     public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route("users.indexForAdmin");
    }
    
    public function restore($id)
    {
        User::onlyTrashed()->find($id)->restore();
        return back();
    }
    
    public function forceDelete($id)
    {
        User::onlyTrashed()->find($id)->forceDelete();
        return back();
    }
    
    public function indexForAdmin()
    {   
        $users = User::all(); 
        $deleted = User::onlyTrashed()->get(); 
    
        return view("users.index_for_admin", [
            "users" => $users,
            "deleted" => $deleted,
        ]);
    }
}
