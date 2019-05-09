@extends("layouts.app")

@section("content")
　　@if(Auth::check())
　　    <div class="row">
　　        <aside class="col-sm-4">
　　            <div class="card">
　　                <div class="card-header">
　　                    <h3 class="card-title">{{ Auth::user()->name }}</h3>
　　                </div>
　　                <div class="card-body">
　　                    <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">
　　                </div>
　　            </div>
　　        </aside>
　　        <div class="col-sm-8">
　　            @if (Auth::id() == $user->id)
　　                {!! Form::open(["route" => "songs.store", "class" => "form-horizontal"]) !!}
　　                    <div class="form-group">
　　                        {!! Form::label("song_name", "曲名") !!}</div>
　　                        {!! Form::text("song_name", old("song_name"), ["class" => "form-control", "rows" => "1"]) !!}
　　                        {!! Form::label("artist_name", "アーティスト名") !!}
　　                        {!! Form::text("artist_name", old("artist_name"), ["class" => "form-control", "rows" => "1"]) !!}
　　                        {!! Form::label("music_age", "曲の年代") !!}
　　                        {{ Form::select("music_age",[1980 => "1980年代", 1990 => "1990年代", 2000 => "2000年代", 2010 => "2010年代"]) }}<br>
　　                        {!! Form::label("comment", "コメント") !!}
　　                        {!! Form::textarea("comment", old("comment"), ["class" => "form-control", "rows" => "2"]) !!}
　　                        {!! Form::label("image_url", "画像") !!}
　　                        {{ Form::file('image_url') }}<br>
　　                        {!! Form::label("video_url", "映像") !!}
　　                        {!! Form::textarea("video_url", old("video_url"), ["class" => "form-control", "rows" => "2"]) !!}
　　                        {!! Form::submit("Post", ["class" => "btn btn-primary btn-block"]) !!}
　　                    </div>
　　                {!! Form::close() !!}
　　            @endif
　　            @if (count($songs) > 0)
　　                @include("songs.songs", ["songs" => $songs])
　　            @endif
　　        </div>
　　    </div>
　　@else
    　　<div class="center-jumbotron">      
            <div class="text-center">
                <h1>Welcome to the YourSongs</h1>
                {!! link_to_route("signup.get", "Sign up now!", [], ["class" => "btn btn-lg btn-primary"]) !!}
            </div>
        </div>
    @endif
@endsection