<ul class="song-cards list-unstyled">
    @foreach($songs as $song)
        <li class="song-card mb-4 pb-3 px-2 border">
            
            <h3 class="song-name p-3 mb-4 text-center" style="word-wrap: break-word;"><i class="fas fa-music mr-3"></i>{!! nl2br(e($song->song_name)) !!}</h3>
            
            <div class="row m-0">
                <div class="col-md-4 text-center song-image">
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
                        
                        <a href="{{ route("songs.songImages", ["id" => $song->id]) }}" class="btn btn-primary btn-modify-profile">画像を変更する</a>
                        
                          
                        @endif
                    </figcaption>
                    </figure>
                </div>
                        
                <div class="col-md-8">
                    <!--曲情報-->
                    <ul class="list-unstyled px-3">
                        <li class="mb-1" style="word-wrap: break-word;"><i class="fas fa-guitar mr-1"></i>アーティスト：{!! nl2br(e($song->artist_name)) !!}</li>
                        <li class="mb-1" style="word-wrap: break-word;"><i class="fas fa-history mr-1"></i>曲の年代：{!! nl2br(e($song->music_age)) !!}年代</li>
                        <li class="mb-1" style="word-wrap: break-word;">
                            <div>
                                <i class="far fa-comment-dots mr-1"></i>About
                            </div>
                            <div class="ml-2 mb-3" style="word-wrap: break-word;">
                                {!! nl2br(e($song->description)) !!}
                            </div>
                        </li>
                        
                        <li class="mb-1 text-center">
                            @if($song->video_url)
                               <iframe class="song-video" src="https://www.youtube.com/embed/{!! nl2br(e($song->video_url)) !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @endif
                        </li>
                    </ul>
                
                </div>
            </div>
            
            <a href="{{ route("songs.show", ["song" => $song]) }}" class="btn btn-light d-block mx-2 my-3">続きを読む</a>
            
            <!--投稿者が自分でないときに限り投稿者情報を表示-->
            @if(Auth::id() !== $song->user_id)
            <div class="about-user ml-2">
                <h4>投稿者情報</h4>
                <div class="media">
                    <div class="media-left ml-3 mr-3">
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
                        <ul class="list-unstyled px-3">
                            @if($song->user->gender == 1)
                            <li class="mb-1" style="word-wrap: break-word;">{!! nl2br(e($song->user->age)) !!}代男性</li>
                            @else
                            <li class="mb-1" style="word-wrap: break-word;">{!! nl2br(e($song->user->age)) !!}代女性</li>
                            @endif
                            <li class="mb-1" style="word-wrap: break-word;">{!! nl2br(e($song->user->favorite_music_age)) !!}年代の音楽が好き</li>
                            
                            @if($song->user->favorite_artist)
                            <li class="mb-1" style="word-wrap: break-word;">好きなミュージシャン：{!! nl2br(e($song->user->favorite_artist)) !!}</li>
                            @endif
                        </ul>
                        
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
            
            <div class="d-flex ml-4 my-2">
                @include("favorite.favorite_button", ["song" => $song])
                
                <a href="{{ route("songs.show", ["song" => $song]) }}" class="btn btn-light d-block p-1 ml-2"><i class="far fa-comments mr-2"></i>コメント {{ count($song->comments) }} 件</a>
            </div>
            
            <div class="ml-4 pr-2" style="display: flex; justify-content: flex-end;">
                @if(Auth::id() == $song->user_id)
                    <a href="{{ route("songs.edit", ["id" => $song->id]) }}" class="btn btn-light mr-3 px-2 py-1">編集</a>
                
                    {!! Form::open(["route" => ["songs.destroy", "$song->id"], "method" => "delete" ]) !!}
                        {!! Form::submit("削除", ["class" => "btn btn-danger btn-sm px-2 py-1"]) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </li>
    @endforeach
</ul>

{{ $songs->render("pagination::bootstrap-4") }}

