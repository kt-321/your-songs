@extends("layouts.app")

@section("content")
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
             @if(Auth::id() == $user->id)
                {!! Form::open(["route" => "songs.store"]) !!}
                    <div class="form-group">
　　                        {!! Form::label("song_name", "曲名") !!}
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
        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="{{ route("users.show", ["id" => $user->id]) }}" class="nav-link {{ Request::is("users/" . $user->id) ? "active" : " "}}">TimeLine<span class-"badge badge-secondary>{{ $count_songs }}</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link">Followings</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Followers</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Favorites</a></li>
            </ul>
            @if (count($songs) > 0)
                @include("songs.songs", ["songs" => $songs])
            @endif 
        </div>
    </div>
@endsection