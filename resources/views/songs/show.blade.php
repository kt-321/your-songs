@extends("layouts.app")
    @section("content")
            
            <!--曲情報-->
            <section class="song-details mb-5">
                <h3 class="song-name text-center mb-3" style="word-wrap: break-word;"><i class="fas fa-music mr-3"></i>{{ $song->song_name }}</h3>
                <div class="row mx-0 mb-3">
                    <div class="col-md-5 text-center">
                        <!--曲画像-->
                        <figure>
                                @if($song->image_url)
                                    <img src="{{ $song->image_url }}" style="width:150px; height:150px;" class="img-thumbnail">
                                @else
                                    <img src="https://your-songs-laravel.s3-ap-northeast-1.amazonaws.com/song.jpeg" style="width:150px; height:150px;" class="img-thumbnail">
                                @endif
                            
                            <figcaption>
                                <!--ログイン時、曲画像のアップロード-->
                                @if(Auth::id() === $song->user_id)
                                <div class="mt-2">
                                    <a href="{{ route("songs.songImages", ["id" => $song->id]) }}" class="btn btn-primary btn-modify-profile">画像を変更</a>
                                </div>
                                @endif
                            </figcaption>
                        </figure>
                    </div>
                
                    <div class="col-md-7">
                        <ul class="list-unstyled px-3">
                            <li class="mb-2" style="word-wrap: break-word;"><i class="fas fa-guitar mr-1"></i>アーティスト：{!! nl2br(e($song->artist_name)) !!}</li>
                            <li class="mb-2" style="word-wrap: break-word;"><i class="fas fa-history mr-1"></i>曲の年代：{!! nl2br(e($song->music_age)) !!}年代</li>
                            @if($song->description)
                            <li class="mb-2" style="word-wrap: break-word;">
                                <div class="mb-1">
                                    <i class="far fa-comment-dots mr-1"></i>説明
                                </div>
                                
                                <div class="status-value balloon4">
                                    <p style="word-wrap: break-word;">{!! nl2br(e($song->description)) !!}</p>
                                </div>
                            </li>
                            @endif
                            
                            @if($song->video_url)
                            <li class="mb-0 text-center" style="word-wrap: break-word;">
                                <div class="text-left mb-1"><i class="fab fa-youtube mr-1"></i>映像</div>
                                <iframe class="song-video" width="560" height="315" src="https://www.youtube.com/embed/{!! nl2br(e($song->video_url)) !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>           
                            </li>
                            @else
                            <li class="mb-0"><i class="fab fa-youtube mr-1"></i>映像はありません。</li>
                            @endif
                        </ul>
                        
                         <!--投稿者が自分でないときに限り投稿者情報を表示-->
                        <div class="about-user ml-2">
                            @if(Auth::id() === $song->user_id)
                            <div class="col-sm-6">
                                <span class="badge badge-success ml-1">自分の投稿</span>
                            </div>
                            @else
                            <div class="user-information1">
                                <h4 class="user-information-title">投稿者情報</h4>
                                <div class="media">
                                    <div class="media-left ml-3 mr-3">
                                        <figure>
                                            @if($song->user->image_url)
                                                <img src="{{ $song->user->image_url }}" alt="アイコン" class="circle2"> 
                                            @elseif($song->user->gender == 1)
                                                <img src="https://your-songs-laravel.s3-ap-northeast-1.amazonaws.com/man.jpeg" alt="アイコン" class="circle2">
                                            @elseif($song->user->gender == 2)
                                                <img src="https://your-songs-laravel.s3-ap-northeast-1.amazonaws.com/woman.jpeg" alt="アイコン" class="circle2">
                                            @else
                                                <img src="https://your-songs-laravel.s3-ap-northeast-1.amazonaws.com/user.png" alt="アイコン" class="circle2">
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
                                        
                                        <a class="btn btn-success btn-sm btn-profile" href="{{ route("users.show", ["id" => $song->user->id]) }}">プロフィール</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div>
                    @include("favorite.favorite_button", ["song" => $song])
                </div>    
                
                <div class="ml-4 pr-2" style="display: flex; justify-content: flex-end;">
                        @if(Auth::id() == $song->user_id)
                            <a href="{{ route("songs.edit", ["id" => $song->id]) }}" class="btn btn-light mr-3 px-2 py-1">編集</a>
                        
                            {!! Form::open(["route" => ["songs.destroy", "$song->id"], "method" => "delete" ]) !!}
                                {!! Form::submit("削除", ["class" => "btn btn-danger btn-sm px-2 py-1", "onClick"=>"delete_alert();return false;"]) !!}
                            {!! Form::close() !!}
                        @endif
                </div>
                
                <!--管理者としてログインしている場合に限りアカウントを削除できる-->
                @if(Auth::check() && Auth::user()->role == 5 && Auth::id() !== $song->user->id)
                    <div class="buttons-delete-user mb-3 text-center">
                        <a class="btn btn-danger" href="/delete/{{ $song->id}}" >この曲を削除</a>
                    </div>
                @endif
                
            </section>
                  
            <section class="comment">
                <div class="comment-index mb-5">
                    
                    @if(count($song->comments) > 0)
                    <p class="comment-counts"><i class="far fa-comments mr-2"></i>コメント（{{ count($song->comments) }}）</p>
                    @else
                    <p>コメントはまだありません。</p>
                    @endif
                    
                    <div class="comment-display">
                        <ul class="list-unstyled">
                        @foreach($comments as $comment)
                            <li class = "py-2 border-top">
                                <div class="d-flex">
                                        <figure class="ml-3 mr-4 my-auto">
                                            @if($comment->user->image_url)
                                            <img src="{{ $comment->user->image_url }}" alt="画像" class="circle2"> 
                                            @elseif($comment->user->gender == 1)
                                            <img src="https://your-songs-laravel.s3-ap-northeast-1.amazonaws.com/man.jpeg" alt="画像" class="circle2">
                                            @elseif($comment->user->gender == 2)
                                            <img src="https://your-songs-laravel.s3-ap-northeast-1.amazonaws.com/woman.jpeg" alt="画像" class="circle2">
                                            @else
                                            <img src="https://your-songs-laravel.s3-ap-northeast-1.amazonaws.com/user.png" alt="画像" class="circle2">
                                            @endif 
                                            <figcaption class="text-center m-0">
                                                <a style="font-size: 15px;" href="{{ route("users.show", ["id" => $comment->user->id]) }}">{{ $comment->user->name }}</a>
                                            </figcaption>
                                        </figure>
                                        
                                        <div class="balloon1-left ml-3 my-auto">
                                            <p style="word-wrap: break-word;">{{ $comment->body }}</p>
                                        </div>
                                </div>    
                                
                                <div class="ml-auto mb-1" style="width:200px;">
                                    <ul class="list-unstyled">
                                        <li class="mr-3">
                                            <span class="text-muted" style="font-size:13px">  投稿  {{ $comment->created_at }}</span>
                                        </li>
                                        <li class="mr-3">
                                            @if(Auth::id() === $comment->user_id)
                                            {!! Form::open(["route" => ["comments.destroy", $comment->id], "method" => "delete"]) !!}
                                                {!! Form::submit("削除", ["class" => "btn btn-danger btn-sm", "onClick"=>"delete_alert();return false;"]) !!}
                                            {!! Form::close() !!}
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                    
                    {{ $comments->render("pagination::bootstrap-4") }}
                </div>
                
                @if(Auth::check())
                <div class="comment-post-form">        
                    <h4 class="mb-3 text-center">コメントを投稿する</h2>
                    
                    <div class="comment-form">   
                            {!! Form::open(["route" => ["comments.store", $song->id]]) !!}
                                {!! Form::hidden("song_id", $song->id) !!}
                                {!! Form::hidden("user_id", $user->id) !!}
                                
                                
                                <div class="row m-0">
                                    <!--{!! Form::label("body", "コメントを投稿する", ["class" => "col-form-label"]) !!}-->
                                    {!! Form::textarea("body", old("body"), ["class" => "form-control col-sm-8 offset-sm-2", "rows" => "4"]) !!}
                                </div>
                                
                                <div class="text-center m-3">
                                    {!! Form::submit("投稿する", ["class" => "btn btn-primary"]) !!}
                                </div>   
                            {!! Form::close() !!}
                    </div>
                </div>
                @endif
            </section>
            
            <div class="my-3 mr-3 text-right">
                <a class="btn btn-light" href="#" v-scroll-to="toTop">ページのトップに戻る</a>
            </div>
  @endsection