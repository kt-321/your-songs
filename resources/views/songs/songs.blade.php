<ul class="song-cards list-unstyled">
    @foreach($songs as $song)
        <li class="song-card mb-4 border">
            <h3 class="m-3" style="word-wrap: break-word;">{!! nl2br(e($song->song_name)) !!}</h3>
            <div class="row m-0">
                <div class="col-md-3">
                    <!--曲画像-->
                    <figure>
                        @if($song->image_url)
                            <img src="{{ $song->image_url }}" style="width:150px; height:150px;" class="img-thumbnail">
                        @else
                            <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/song.jpeg" style="width:150px; height:150px;" class="img-thumbnail">
                        @endif
                    
                    <figcaption>
                        <!--ログイン時、曲画像のアップロード-->
                        @if(Auth::id() == $song->user_id)
                            {!! Form::open(["route" => ["songImages.upload", $song->id], "enctype" => "multipart/form-data"]) !!}
                            <div class="form-group">
                                <div class="row">
                                    {!! Form::label("file", "画像", ["class" => "col-form-label col-sm-2"]) !!}
                                    <div class="col-sm-10">
                                    {{Form::file("file", ["class" => "form-control"])}}
                                    </div>
                                </div>
                                {!! Form::submit("画像アップロード", ["class" => "btn btn-primary", "name" => "btn-upload"]) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </figcaption>
                    </figure>
                </div>
                        
                <div class="col-md-9">
                    <!--曲情報-->
                    <ul class="list-unstyled">
                        <li class="mb-1" style="word-wrap: break-word;">アーティスト：{!! nl2br(e($song->artist_name)) !!}</li>
                        <li class="mb-1" style="word-wrap: break-word;">曲の年代：{!! nl2br(e($song->music_age)) !!}年代</li>
                        <li class="mb-1" style="word-wrap: break-word;">曲紹介：{!! nl2br(e($song->description)) !!}</li>
                        <li class="mb-1">
                            @if($song->video_url)
                               <iframe class="song-video" src="https://www.youtube.com/embed/{!! nl2br(e($song->video_url)) !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            
            <a href="{{ route("songs.show", ["song" => $song]) }}" class="btn btn-light d-block m-2">続きを読む</a>
            
            @if(Auth::id() !== $song->user_id)
            <div class="about-user ml-3">
                <h4>投稿者情報</h4>
                <div class="media">
                    <div class="media-left mr-5">
                        <figure>
                            @if($song->user->image_url)
                                <img src="{{ $song->user->image_url }}" style="width: 50px; height: 50px" alt="画像"> 
                            @elseif($song->user->gender == 1)
                                <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/man.jpeg" alt="画像" style="width: 50px; height: 50px">
                            @else
                                <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/woman.jpeg" alt="画像" style="width: 50px; height: 50px">
                            @endif
                            <figcaption class="text-center m-0">
                                <a href="{{ route("users.show", ["id" => $song->user->id]) }}">{{ $song->user->name }}</a>
                            </figcaption>
                        </figure>
                    </div>
                    
                    <div class="media-body">
                        @if($song->user->gender == 1)
                        <p class="mb-0">{!! nl2br(e($song->user->age)) !!}代男性 </p>
                        @else
                        <p class="mb-0">{!! nl2br(e($song->user->age)) !!}代女性 </p>
                        @endif
                       
                        <p>{!! nl2br(e($song->user->favorite_music_age)) !!}年代の音楽が好き</p>
                       
                        @if($song->user->favorite_artist)
                        <p class="mb-0">好きなミュージシャン：{!! nl2br(e($song->user->favorite_artist)) !!}</p>
                        @endif
                        
                        <div style="display:inline-block">
                            @include("user_follow.follow_button", ["user" => $song->user])
                        </div>
                        
                        <a class="btn btn-success btn-sm" href="{{ route("users.show", ["id" => $song->user->id]) }}">プロフィール</a>
                    </div>
                </div>
            </div>
            @endif
            
            <div style="width:180px; margin-left:auto;">
                <ul class="list-unstyled">
                    <li class="mr-3">
                        <span class="text-muted" style="font-size:13px">  投稿  {{ $song->created_at }}</span>
                    </li>
                    <li class="mr-3">
                        @if($song->updated_at)
                        <span class="text-muted" style="font-size:13px">  更新  {{ $song->updated_at }}</span>
                        @endif
                    </li>
                </ul> 
            </div>
            
            <div class="d-flex m-2">
                @include("favorite.favorite_button", ["song" => $song])
                <p class="favorite-counts"><span class="badge badge-secondary"> {{ count($song->favorite_users) }}</span></p>
                
                <p class="comment-counts ml-2">コメント {{ count($song->comments) }} 件</p>
            </div>
            
            <div class="d-flex m-2">
                @if(Auth::id() == $song->user_id)
                    <a href="{{ route("songs.edit", ["id" => $song->id]) }}" class="btn btn-light">曲情報を編集</a>
                
                    {!! Form::open(["route" => ["songs.destroy", "$song->id"], "method" => "delete" ]) !!}
                        {!! Form::submit("削除", ["class" => "btn btn-danger btn-sm"]) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </li>
    @endforeach
</ul>

{{ $songs->render("pagination::bootstrap-4") }}

