@extends("layouts.app")

@section("content")

　　    <h1>お気に入り数ランキング</h1>
　　    <a href="{{ url('/commentsRanking') }}">→　コメント数ランキング</a>
　　    @include("songs.songs", ["songs" => $songs])
@endsection