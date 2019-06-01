@extends("layouts.app")

@section("content")
　　@if(Auth::check())
　　    <h1>ランキング</h1>
　　    <h2>お気に入り数順</h2>
　　    <a href="{{ url('/commentsRanking') }}">→　コメント数順</a>
　　    
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