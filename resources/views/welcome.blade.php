@extends("layouts.app")

@section("content")
　　@if(Auth::check())
　　    <h1>人気曲ランキング</h1>
　　    @include("songs.songs", ["songs" => $songs])
　　@else
    　　<div class="center-jumbotron">      
            <div class="text-center">
                <h1>Welcome to the YourSongs</h1>
                <a href="{{ route("signup.get") }}" class="btn btn-lg btn-primary">ユーザー登録する</a>
            </div>
        </div>
    @endif
@endsection