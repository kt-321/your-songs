@extends("layouts.app")

@section("content")
    <h1>『 {!! nl2br(e($song->song_name)) !!} 』</h1>
    
    <!--曲情報-->
    <section class="song-details mt-5 mb-5">
        <div class="row">
            <div class="col-sm-4">
                <!--曲画像-->
                @if($song->image_url)
                    <img src="{{ $song->image_url }}" style="width:150px; height:150px;">
                @else
                    <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/song.jpeg" style="width:150px; height:150px;">
                @endif
            </div>
        
            <div class="col-sm-8">
                <p class="mb-0">アーティスト：{!! nl2br(e($song->artist_name)) !!}</p>
                <p class="mb-0">曲の年代：{!! nl2br(e($song->music_age)) !!}年代</p>
                <p class="mb-0">説明：{!! nl2br(e($song->description)) !!}</p>
                @if($song->video_url)
                <iframe width="560" height="315" src="https://www.youtube.com/embed/{!! nl2br(e($song->video_url)) !!}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>           
                @else
                <p class="mb-0">映像はありません。</p>
                @endif
                
                <div class="media mb-3">
                    <div class="media-left">
                        <figure>
                            @if($song->user->image_url)
                            <img src="{{ $song->user->image_url }}" style="width: 50px; height: 50px" alt="画像" class="d-table"> 
                            @elseif($song->user->gender == 1)
                            <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/man.jpeg" alt="画像" style="width: 50px; height: 50px">
                            @else
                            <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/woman.jpeg" alt="画像" style="width: 50px; height: 50px">
                            @endif
                            
                            <figcaption class="text-center m-0 d-table-caption">
                                <a href="{{ route("users.show", ["id" => $song->user->id]) }}">{{ $song->user->name }}</a>
                            </figcaption>
                        </figure>
                    </div>
                    
                    <div class="media-body">
                        <p><span class="text-muted">  投稿日時  {{ $song->created_at }}</span></p>
                    </div>
                </div>
                
            </div>
        </div>
    
        <div class="d-flex">
                <div>
                    <p>お気に入り数 <span class="badge badge-secondary"> {{ count($song->favorite_users) }}</span></p>
                </div>
                
                <div>
                    @include("favorite.favorite_button", ["song" => $song])
                </div>    
        </div>
    
    
        <div class="d-flex">    
            @if(Auth::id() == $song->user_id)  
                <div>
                    {!! Form::open(["route" => ["songs.destroy", $song->id], "method" => "delete" ]) !!}
                        {!! Form::submit("削除", ["class" => "btn btn-danger btn-sm"]) !!}
                    {!! Form::close() !!}
                </div>            
                
                <div>
                    <a href="{{ route("songs.edit", ["id" => $song->id]) }}" class="btn btn-light">曲情報を編集</a>
                </div>   
                        
                <div>    
                    {!! Form::open(["route" => ["songImages.upload", $song->id], "enctype" => "multipart/form-data"]) !!}
                    <div class="form-group row">
                        {!! Form::label("file", "画像", ["class" => "col-form-label col-sm-2"]) !!}
                        <div class="col-sm-10">
                            {{Form::file("file", ["class" => "form-control"])}}
                        </div>
                        {!! Form::submit("画像アップロード", ["class" => "btn btn-primary"]) !!}
                    </div>
                    {!! Form::close() !!}
                </div>    
            @endif
        </div>
    </section>
    
    <section class="comment">
        <div class="comment-index mb-5">
            <h2 class="mb-3">コメント一覧</h2>
                
            <div class="comment-display">
                    @foreach($comments as $comment)
                            <div class="media mb-3">
                                <div class="media-left mr-5">
                                    <figure>
                                        @if($comment->user->image_url)
                                        <img src="{{ $comment->user->image_url }}" style="width: 50px; height: 50px" alt="画像"> 
                                        @elseif($comment->user->gender == 1)
                                        <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/man.jpeg" alt="画像" style="width: 50px; height: 50px">
                                        @else
                                        <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/woman.jpeg" alt="画像" style="width: 50px; height: 50px">
                                        @endif 
                                        <figcaption class="text-center m-0">
                                            <a href="{{ route("users.show", ["id" => $comment->user->id]) }}">{{ $comment->user->name }}</a>
                                        </figcaption>
                                    </figure>
                                </div>
                                
                                <div class="media-body">
                                    <!--<p style="word-wrap:break-word">{{ $comment->body }}</p>-->
                                    <p>{{ $comment->body }}</p>
                                    <p class="text-right"><span class="text-muted">  投稿日時  {{ $comment->created_at }}</span></p>
                                    @if(Auth::id() == $comment->user_id)
                                    {!! Form::open(["route" => ["comments.destroy", $comment->id], "method" => "delete"]) !!}
                                        {!! Form::submit("削除", ["class" => "btn btn-danger btn-sm"]) !!}
                                    {!! Form::close() !!}
                                    @endif
                                </div>
                                
                            </div>
                    @endforeach
            </div>
            
            {{ $comments->render("pagination::bootstrap-4") }}
        </div>
    
        <div class="cpmment-post">        
            <h2 class="mb-3">コメントを投稿する</h2>
            
            <div class="comment-form">   
                    {!! Form::open(["route" => ["comments.store", $song->id]]) !!}
                        {!! Form::hidden("song_id", $song->id) !!}
                        {!! Form::hidden("user_id", $user->id) !!}
                        
                        <div class="row">
                            {!! Form::label("body", "コメント", ["class" => "col-form-label col-sm-2"]) !!}
                            {!! Form::textarea("body", old("body"), ["class" => "form-control col-sm-10", "rows" => "3"]) !!}
                        </div>
                        
                        <div class="text-center m-3">
                            {!! Form::submit("投稿する", ["class" => "btn btn-primary"]) !!}
                        </div>   
                    {!! Form::close() !!}
            </div>
        </div>
    </section>

@endsection