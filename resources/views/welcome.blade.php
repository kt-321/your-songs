<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>YourSongs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="css/style.css" type="text/css" rel="stylesheet">
    </head>
    
    <body>
        @include("commons.navbar")
        <!--@if(Auth::check())-->
        <!--    <header>-->
        <!--    </header>-->
             
        <!--    <div class="container p-4">-->
        <!--        @include("commons.error_messages")-->
           
        <!--        <h1 class="text-center mb-4"><i class="fas fa-trophy mr-1"></i>人気曲ランキング</h1>-->
        <!--        <h2><i class="fas fa-star mr-1"></i>お気に入り数が多い順</h2>-->
                
        <!--        <ul class="nav nav-tabs nav-justified mb-3">-->
        <!--            <li class="nav-item"><a href="{{ url("favoritesRanking/all") }}" class="nav-link {{ Request::is("/") ? "active" : ""}}"><i class="fas fa-star mr-1"></i>お気に入り数が多い順</a></li>-->
        <!--            <li class="nav-item"><a href="{{ url("commentsRanking/all") }}" class="nav-link {{ Request::is("commentsRanking/*") ? "active" : ""}}"><i class="far fa-comments mr-1"></i>コメント数が多い順</a></li>-->
        <!--        </ul>-->
                
        <!--        <select class="mb-2" name="select" onChange="location.href=value;">-->
        <!--             <option value="#">年代を選択</option>-->
        <!--             <option value="{{ url("/favoritesRanking/all") }}">全ての年代</option>-->
        <!--             <option value="{{ url("/favoritesRanking/1980") }}">1980年代</option>-->
        <!--             <option value="{{ url("/favoritesRanking/1990") }}">1990年代</option>-->
        <!--             <option value="{{ url("/favoritesRanking/2000") }}">2000年代</option>-->
        <!--             <option value="{{ url("/favoritesRanking/2010") }}">2010年代</option>-->
        <!--        </select> -->
            
        <!--        @include("songs.songs", ["songs" => $songs])-->
        <!--    </div> -->
       
        <!--@else-->
            <header class="text-center header-before-login">
                <h1 class="caption">YourSongs</h1>
            </header>
            
        　　<div class="container container-before-login p-4">      
                <div class="text-center">
                    <h1 class=>Welcome to the YourSongs</h1>
                    <a href="{{ route("login") }}" class="btn btn-lg btn-primary"><i class="fas fa-sign-out-alt mr-1"></i>ログイン</a>
                    <a href="{{ route("signup.get") }}" class="btn btn-lg btn-success"><i class="fas fa-user-plus mr-1"></i>新規登録</a>
                </div>
            </div>
        <!--@endif-->
        
        <footer class="bg-dark mt-5">
            <small>&copy; 2019 YourSongs</small>
        </footer>
     
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>