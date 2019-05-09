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
            
            <!--ユーザー情報-->
            <div class="user-profile">
                <p class="mb-0">名前：{!! nl2br(e($user->name)) !!}</p>
                <p class="mb-0">Ｅメール：{!! nl2br(e($user->email)) !!}</p>
                <p class="mb-0">年齢：{!! nl2br(e($user->age)) !!}代</p>
                @if($user->gender == 1)<p class="mb-0">性別：男性 </p>
                @else<p class="mb-0">性別：女性 </p>
                @endif
                <p class="mb-0">アイコン：{!! nl2br(e($user->image_url)) !!}</p>
                <p class="mb-0">好きな音楽の年代：{!! nl2br(e($user->favorite_music_age)) !!}年代</p>
                <p class="mb-0">好きなミュージシャン：{!! nl2br(e($user->favorite_artist)) !!}</p>
                <p class="mb-0">自由コメント：{!! nl2br(e($user->comment)) !!}</p>
            </div>
            <!--フォローボタンまたはフォロー解除ボタン-->
            @include("user_follow.follow_button", ["user" => $user])
            
            <!--曲投稿-->
            @if(Auth::id() == $user->id)
                {!! Form::open(["route" => "songs.store"]) !!}
                    <div class="form-group row mb-0">
                        {!! Form::label("song_name", "曲名", ["class" => "col-form-label col-sm-2"]) !!}
                        <div class="col-sm-10">
                            {!! Form::text("song_name", old("song_name"), ["class" => "form-control", "rows" => "1"]) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {!! Form::label("artist_name", "アーティスト名", ["class" => "col-form-label col-sm-2"]) !!}
                        <div class="col-sm-10">
                            {!! Form::text("artist_name", old("artist_name"), ["class" => "form-control", "rows" => "1"]) !!}
                        </div>
                    </div>    
                    
                    <div class="form-group row">
                        {!! Form::label("music_age", "曲の年代", ["class" => "col-form-label col-sm-2"]) !!}
                        <div class="col-sm-3">
                            {{ Form::select("music_age", [1980 => "1980年代", 1990 => "1990年代", 2000 => "2000年代", 2010 => "2010年代"], ["class" => "form-control"]) }}
                        </div>    
                    </div>     
                    
                    <div class="form-group row">
                        {!! Form::label("comment", "コメント", ["class" => "col-form-label col-sm-2"]) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea("comment", old("comment"), ["class" => "form-control", "rows" => "2"]) !!}
                        </div>
                    </div>
                         
                    <div class="form-group row">        
                        {!! Form::label("image_url", "画像", ["class" => "col-form-label col-sm-2"]) !!}
                        <div class="col-sm-10">
                            {{ Form::file('image_url', ["class" => "form-control"]) }}
                        </div>
                    </div>
                    
                    <div class="form-group row">        
                        {!! Form::label("video_url", "映像", ["class" => "col-form-label col-sm-2"]) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea("video_url", old("video_url"), ["class" => "form-control", "rows" => "2"]) !!}
                        </div>
                    </div>
                    
                        {!! Form::submit("Post", ["class" => "btn btn-primary btn-block"]) !!}
                {!! Form::close() !!}
            @endif
        </aside>
        <div class="col-sm-8">
            @include("users.navtabs", ["user" => $user])
            @if (count($songs) > 0)
                @include("songs.songs", ["songs" => $songs])
            @endif 
        </div>
    </div>
@endsection