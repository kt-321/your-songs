@extends("layouts.app")

@section("content")
    @if(Auth::check())
        <h1>人気曲ランキング</h1>
        <h2>お気に入り数が多い順</h2>
        
        <ul class="nav nav-tabs nav-justified mb-3">
            <li class="nav-item"><a href="{{ url("favoritesRanking/all") }}" class="nav-link {{ Request::is("/") ? "active" : ""}}">お気に入り数が多い順</a></li>
            <li class="nav-item"><a href="{{ url("commentsRanking/all") }}" class="nav-link {{ Request::is("commentsRanking/*") ? "active" : ""}}">コメント数が多い順</a></li>
        </ul>
        
        <select class="mb-2" name="select" onChange="location.href=value;">
             <option value="#">年代を選択</option>
             <option value="{{ url("/favoritesRanking/all") }}">全ての年代</option>
             <option value="{{ url("/favoritesRanking/1980") }}">1980年代</option>
             <option value="{{ url("/favoritesRanking/1990") }}">1990年代</option>
             <option value="{{ url("/favoritesRanking/2000") }}">2000年代</option>
             <option value="{{ url("/favoritesRanking/2010") }}">2010年代</option>
        </select> 
    
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