<ul class="media-list">
    @foreach($songs as $song)
    <li class="media mb-3">
        <div class="media-body">
            <div class="row">
                <div class="col-sm-3">
                    <!--曲画像-->
                    @if($song->image_url)
                        <img src="{{ $song->image_url }}" style="width:150px; height:150px;">
                    @else
                        <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/song.jpeg" style="width:150px; height:150px;">
                    @endif
                </div>
            
                <div class="col-sm-9">
                    <!--曲情報-->
                    <p class="mb-0">曲名：{!! nl2br(e($song->song_name)) !!}</p>
                    <p class="mb-0">アーティスト：{!! nl2br(e($song->artist_name)) !!}</p>
                    <p class="mb-0">曲の年代：{!! nl2br(e($song->music_age)) !!}年代</p>
                    <p class="mb-0">曲紹介：{!! nl2br(e($song->description)) !!}</p>
                    
                    @if($song->video_url)
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{!! nl2br(e($song->video_url)) !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @endif
                    
                    <a href="{{ route("songs.show", ["song" => $song]) }}" class="btn btn-light">続きを読む</a>
                    <div>
                        @if($song->user->image_url)
                            <img src="{{ $song->user->image_url }}" style="width: 50px; height: 50px" alt="画像"> 
                        @elseif($song->user->gender == 1)
                            <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/man.jpeg" alt="画像" style="width: 50px; height: 50px">
                        @else
                            <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/woman.jpeg" alt="画像" style="width: 50px; height: 50px">
                        @endif
                        <a href="{{ route("users.show", ["id" => $song->user->id]) }}">{{ $song->user->name }}</a><span class="text-muted">  投稿日時  {{ $song->created_at }}</span>
                    </div>
                </div>
            </div>
            
            <div class="d-flex">
                @include("favorite.favorite_button", ["song" => $song])
                <p class="favorite-counts"><span class="badge badge-secondary"> {{ count($song->favorite_users) }}</span></p>
                
                @if(Auth::id() == $song->user_id)
                    {!! Form::open(["route" => ["songs.destroy", "$song->id"], "method" => "delete" ]) !!}
                        {!! Form::submit("削除", ["class" => "btn btn-danger btn-sm"]) !!}
                    {!! Form::close() !!}
                    
                    <a href="{{ route("songs.edit", ["id" => $song->id]) }}" class="btn btn-light">曲情報を編集</a>
                    
                {!! Form::open(["route" => ["songImages.upload", $song->id], "enctype" => "multipart/form-data"]) !!}
                <div class="form-group row">
                    {!! Form::label("file", "画像", ["class" => "col-form-label col-sm-2"]) !!}
                    <div class="col-sm-10">
                        {{Form::file("file", ["class" => "form-control"])}}
                    </div>
                    {!! Form::submit("画像アップロード", ["class" => "btn btn-primary"]) !!}
                </div>
                {!! Form::close() !!}
                    
                @endif
            </div>
            
        </div>
    </li>
    @endforeach
</ul>
{{ $songs->render("pagination::bootstrap-4") }}