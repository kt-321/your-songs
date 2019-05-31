@extends("layouts.app")

@section("content")
　　    <h1>コメント数ランキング</h1>
　　    <a href="{{ url('/favoritesRanking') }}">→　お気に入り数ランキング</a>
　　    @include("songs.songs", ["songs" => $songs])
@endsection