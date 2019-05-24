<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\User;

use App\Song;

class SongImagesController extends Controller
{
    
     public function upload(Request $request)
    {
        $file = $request->file("file");
        
        $path = Storage::disk("s3")->putFile("/", $file, "public");
        
        $url = Storage::disk("s3")->url($path);
        
        Song::where("id", $request->id)->update(["image_url" => $url]);
        return redirect()->back();
    }
}

