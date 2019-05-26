<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\User;

class UserImagesController extends Controller
{   
    public function upload(Request $request)
    {
        $file = $request->file("file");

        $path = Storage::disk("s3")->putFile("/", $file, "public");
        
        $url = Storage::disk("s3")->url($path);
        
        $user=User::find(auth()->id());
        
        
        $user->image_url =  $url;
        $user->save();
        
        return redirect()->back()->with("s3url", $url);
    }
    
}