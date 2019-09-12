<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class FavoritesController extends Controller
{
    public function store(Request $request, $song_id)
    {
        \Auth::user()->favorite($song_id);
        return back();
    }
    
    public function destroy($song_id)
    {   
        $user=\Auth::user();
        $user->unfavorite($song_id);
        $favorites = $user->favorites()->get();
        
        
        // return back();
        
        
        
        // if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        //     //処理を記述  
            
        //     return response()->json(
        //         [
        //           'songs' => $favorites
        //         ]);
        // }
        
        // if ($request->ajax()) {
        //     // Ajaxである！
        //     return response()->json(
        //         [
        //           "songs" => $favorites
        //         ],
        //         200,[],
        //         JSON_UNESCAPED_UNICODE
        //         );
        // } else {
        //     // Ajaxではない
        //     return back();
        // }
    
        
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && (strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')) {
            // Ajaxである
            return response()->json(
                [
                  "songs" => $favorites
                ],
                200,[],
                JSON_UNESCAPED_UNICODE
                );
                // return redirect("users/".$user->id."/favorites");
                
        // echo 'HTTP Request by Ajax !!';
        
        }else{
            // Ajaxではない
            return back();
        }
        
    }
}
