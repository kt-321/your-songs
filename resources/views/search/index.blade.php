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
            
            <!--<div id="example">-->
            <!--    <h2 class="text-center">一覧</h2>-->
            <!--    <carousel :per-page-custom="[[0, 1], [768, 2], [992, 3]]" :autoplay="true" :loop="true" :speed=3000 :navigation-enabled="true">-->
            <!--        @foreach($songs as $song)-->
            <!--        <slide class="border py-1">-->
            <!--        <a href="{{ url("songs/{$song->id}") }}" class="text-dark">-->
            <!--            <figure>-->
            <!--                @if($song->image_url)-->
            <!--                    <img src="{{ $song->image_url }}" style="width:100px; height:100px;" class="img-thumbnail">-->
            <!--                @else-->
            <!--                    <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/song.jpeg" style="width:100px; height:100px;" class="img-thumbnail">-->
            <!--                @endif-->
                        
            <!--                <figcaption>-->
                                
            <!--                </figcaption>-->
            <!--            </figure>-->
            <!--            <ul class="list-unstyled px-3">-->
            <!--                <li class="mb-1" style="word-wrap: break-word;"><i class="fas fa-music mr-3"></i>曲名：{!! nl2br(e($song->song_name)) !!}</li>-->
            <!--                <li class="mb-1" style="word-wrap: break-word;"><i class="fas fa-guitar mr-1"></i>アーティスト：{!! nl2br(e($song->artist_name)) !!}</li>-->
            <!--                <li class="mb-1" style="word-wrap: break-word;"><i class="fas fa-history mr-1"></i>曲の年代：{!! nl2br(e($song->music_age)) !!}年代</li>-->
            <!--            </ul>-->
            <!--        </a>-->
            <!--        </slide>-->
            <!--        @endforeach-->
            <!--    </carousel>-->
            <!--</div>-->
            
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
            <div class="row mb-3">
                <!--<div class="col-md-4">   -->
                <div style="width: 100%;">   
                    <form class="form-inline d-block text-center">
                        <div class="form-group d-inline">
                            <input style="width: 50%; " type="text" name="keyword" value="{{ $keyword }}"
                            placeholder="曲名もしくはアーティスト名を入力">
                            <input type="submit" value="検索" >
                        </div>
                    </form>
                </div>
            </div>
            
            <!--検索結果の表示-->
            <div class="result">
                <!--該当する曲の数-->
                @if($keyword != "")
                    @if(count($songs) > 0)
                    <p class="text-center m-2">「{{ $keyword }}」の検索結果 {{ count($songs) }}曲</p>
                    @else
                    <p class="text-center m-2">該当する曲は見つかりませんでした。</p>
                    @endif   
                @endif
                
                <!--該当する曲の一覧-->
                @if(count($songs) > 0)
                
                @include("songs.songs", ["songs" => $songs])
                
                @endif
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