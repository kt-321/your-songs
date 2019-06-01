@extends("layouts.app")

@section("content")
        <h1>人気曲ランキング</h1>
　　    <h2>お気に入り数順</h2>
　　    <a href="{{ url('/commentsRanking') }}">→　コメント数順</a>
　　    @include("songs.songs", ["songs" => $songs])
@endsection