<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Song;

use App\User;

use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            "user_id" => "required",
            "song_id" => "required",
            "body" => "required|max:2000",
        ]);
        
        Comment::create([
            'user_id' => $request->user()->id,
            'song_id' => $request->song_id,
            'body' => $request->body,
        ]);
       
        return back();
    }
    
    
    public function destroy($id)
    {
        $comment = Comment::find($id);
        
        if(\Auth::id() === $comment->user_id){
            $comment->delete();
        }
        
        return back();
    }
    
}
