<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFollowController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->follow($id);
        return back();
    }
    
    public function destroy($id)
    {   
        $user=\Auth::user();
        $user->unfollow($id);
        $followings = $user->followings()->get();
        
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')) {
            // Ajaxである
            return response()->json(
                [
                  "users" => $followings
                ],
                200,[],
                JSON_UNESCAPED_UNICODE
                );
                
        
        }else{
            // Ajaxではない
            return back();
        }
    }
}
