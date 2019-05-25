@extends("layouts.app")

@section("content")
　　@if(Auth::check())
　　    <h1>人気曲ランキング</h1>
　　    <!--<div class="row">-->
　　        <!--<aside class="col-sm-4">-->
　　        <!--    @include("users.card", ["user" => Auth::user()])-->
　　        <!--</aside>-->
　　        <!--<div class="col-sm-8">-->
　　        <!--    @if (Auth::id() == $user->id)-->
　　        <!--        {!! link_to_route("songs.create", "曲を投稿", [], ["class" => "btn btn-lg btn-primary"]) !!}-->
　　        <!--    @endif-->
　　            <!--@if (count($songs) > 0)-->
　　                @include("songs.songs", ["songs" => $songs])
　　            <!--@endif-->
　　    <!--    </div>-->
　　    <!--</div>-->
　　@else
    　　<div class="center-jumbotron">      
            <div class="text-center">
                <h1>Welcome to the YourSongs</h1>
                {!! link_to_route("signup.get", "Sign up now!", [], ["class" => "btn btn-lg btn-primary"]) !!}
            </div>
        </div>
    @endif
@endsection