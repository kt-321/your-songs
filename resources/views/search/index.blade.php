<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>YourSongs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="../css/style.css" type="text/css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
    </head>
    
    <body>
         @include("commons.navbar")
        
        <header>
            <button type="button" onclick=history.back()>戻る</button> 
        </header>
        
        <div class="container p-4">
            @include("commons.error_messages")
            
            <!--@if(count($recommended_songs) > 0)-->
            <div id="example" class="mb-5">
                <span class="badge badge-pill badge-success mb-2">あなたへのおすすめ曲</span>
                <carousel :per-page-custom="[[0, 1], [768, 2], [992, 3]]" :autoplay="true" :loop="true" :speed=3000 :navigation-enabled="true" :pagination-enabled="false">
                    @foreach($recommended_songs as $recommended_song)
                    <slide class="border py-1">
                        <a href="{{ url("songs/{$recommended_song->id}") }}" class="text-dark">
                            <figure>
                                @if($recommended_song->image_url)
                                    <img src="{{ $recommended_song->image_url }}" style="width:100px; height:100px;" class="img-thumbnail">
                                @else
                                    <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/song.jpeg" style="width:100px; height:100px;" class="img-thumbnail">
                                @endif
                            
                                <figcaption>
                                    
                                </figcaption>
                            </figure>
                            <ul class="list-unstyled px-3">
                                <li class="mb-1" style="word-wrap: break-word;"><i class="fas fa-music mr-3"></i>曲名：{!! nl2br(e($recommended_song->song_name)) !!}</li>
                                <li class="mb-1" style="word-wrap: break-word;"><i class="fas fa-guitar mr-1"></i>アーティスト：{!! nl2br(e($recommended_song->artist_name)) !!}</li>
                                <li class="mb-1" style="word-wrap: break-word;"><i class="fas fa-history mr-1"></i>曲の年代：{!! nl2br(e($recommended_song->music_age)) !!}年代</li>
                            </ul>
                        </a>
                    </slide>
                    @endforeach
                </carousel>
            </div>
            <!--@endif-->
            
            <h1 class="text-center mb-4"><i class="fas fa-search mr-1"></i>曲を探す</h1>
            
            
            
            <!--検索フォーム-->
            <form class="px-3 mb-5">
                <div class="form-group">
                    <div class="row m-0">
                        <div class="col-sm-3 my-auto">
                            <label class="form-label m-0">曲名</label>
                        </div>
                        
                        <div class="col-sm-5">
                            <input class="form-control" type="text" name="song_name" value="{{ $song_name }}" placeholder="曲名を入力">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row m-0">
                        <div class="col-sm-3 my-auto">
                            <label class="form-label m-0">アーティスト名</label>
                        </div>
                        
                        <div class="col-sm-5">
                            <input class="form-control" type="text" name="artist_name" value="{{ $artist_name }}" placeholder="アーティスト名を入力">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row m-0">
                        <div class="col-sm-3 my-auto">
                            <label class="form-label m-0">年代</label>
                        </div>
                        
                        <div class="col-sm-4">
                            <select name="music_age" class="form-control select select-primary mbl" data-toggle="select">
                                <option value="">全て</option>
                                <option value="1970" @if($music_age=="1970") selected @endif>1970年代</option>
                                <option value="1980" @if($music_age=="1980") selected @endif>1980年代</option>
                                <option value="1990" @if($music_age=="1990") selected @endif>1990年代</option>
                                <option value="2000" @if($music_age=="2000") selected @endif>2000年代</option>
                                <option value="2010" @if($music_age=="2010") selected @endif>2010年代</option>
                            </select>
                        </div>
                    </div>
                </div>
             
              <div class="col-xs-offset-2 col-xs-10 text-center">
                  <button type="submit" class="btn btn-default btn-success">以上の条件で検索</button>
              </div>
            </form>
            
            <!--検索結果の表示-->
                @if($song_name != "" || $artist_name != "" || $music_age != "")
                    @if(count($songs) == 0)
                    <p class="text-center m-2">該当する曲は見つかりませんでした。</p>
                    @endif   
                @endif
            
            <!--    該当する曲の一覧-->
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
                                        <div class="mt-2">
                                            <a href="{{ route("songs.songImages", ["id" => $song->id]) }}" class="btn btn-primary btn-modify-profile">画像を変更</a>
                                        </div>
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
                                        @if($song->description)
                                            <div>
                                                <i class="far fa-comment-dots mr-1"></i>About
                                            </div>
                                            <div class="ml-2 mb-3 border" style="word-wrap: break-word;">
                                                {!! nl2br(e($song->description)) !!}
                                            </div>
                                        @endif
                                    </li>
                                    
                                    <li class="mb-1 text-center">
                                        @if($song->video_url)
                                           <div class="text-left"><i class="fab fa-youtube mr-1"></i>映像</div>
                                           <iframe class="song-video" src="https://www.youtube.com/embed/{!! nl2br(e($song->video_url)) !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        @endif
                                    </li>
                                </ul>
                            
                            </div>
                        </div>
                        
                        <a href="{{ route("songs.show", ["song" => $song]) }}" class="btn btn-light d-block mx-2 my-3">続きを読む</a>
                        
                        <!--投稿者が自分でないときに限り投稿者情報を表示-->
                        <div class="about-user ml-2">
                            @if(Auth::id() == $song->user_id)
                            <span class="badge badge-success ml-1">自分の投稿</span>
                            @else
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
                            @endif
                        </div>
                        
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
                        
                        <!--管理者としてログインしている場合に限り曲を削除できる-->
                        @if(Auth::user()->role == 5 && Auth::id() !== $song->user->id)
                            <div class="buttons-delete-user mb-3 text-center">
                                <a class="btn btn-danger" href="/delete/{{ $song->id}}">この曲を削除</a>
                            </div>
                        @endif
                    </li>
                @endforeach
                </ul>
                
                <div class="paginate text-center">
                    {{ $songs->appends(["song_name"=>$song_name,"artist_name"=>$artist_name, "music_age"=>$music_age])->render("pagination::bootstrap-4") }}
                </div>
            </div>
                    
            <footer class="bg-dark mt-5">
                <small>&copy; 2019 YourSongs</small>
            </footer>
                    
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script src="https://ssense.github.io/vue-carousel/js/vue-carousel.min.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>