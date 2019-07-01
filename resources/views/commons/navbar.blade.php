<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="/home">YourSongs</a>
    
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="nav_bar">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav">
            <!--ログイン中のナビゲーションバー-->
            @if (Auth::check())
                @if(Auth::user()->role == 5)
                <li class="nav-item">
                    <a href="{{ url("/index-for-admin") }}" class="nav-link"><i class="fas fa-trash-alt mr-1"></i>曲の管理</a>
                </li>
                @endif
                
                <li class="nav-item"><a href="{{ url("/home") }}" class="nav-link"><i class="far fa-lightbulb mr-1"></i>新しく投稿された曲</a></li>
                
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-trophy mr-1"></i>ランキング</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item"><a href="{{ url("/favorites-ranking/all") }}"><i class="far fa-star mr-1"></i>お気に入り数順</a></li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item"><a href="{{ url("/comments-ranking/all") }}"><i class="far fa-comments mr-1"></i>コメント数順</a></li>
                    </ul>
                </li>  
                
                <li class="nav-item"><a href="{{ url("/users") }}" class="nav-link"><i class="fas fa-user mr-1"></i>ユーザー</a></li>
                
                <li class="nav-item"><a href="{{ url("/search") }}" class="nav-link"><i class="fas fa-search mr-1"></i>曲を探す</a></li>
                
                <li class="nav-item"><a href="{{ route("songs.create") }}" class="nav-link"><i class="fas fa-plus mr-1"></i>曲を追加</a></li>
                
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user()->image_url)  
                        <img src="{{ Auth::user()->image_url }}" alt="アイコン" class="img-fluid mh-100 mr-1" style="height: 2.8vh; width: 2.8vh;">
                        @endif
                        {{ Auth::user()->name }}
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-right bg-dark border-white">
                        <li class="dropdown-item"><i class="fas fa-user-circle mr-1" style="color: white;"></i>{!! link_to_route("users.show", "マイページ", ["id" => Auth::id()], ["class" => "text-white"]) !!}</li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item"><i class="fas fa-sign-out-alt mr-1" style="color: white;"></i>{!! link_to_route("logout.get", "ログアウト",[], ["class" => "text-white"]) !!}</li>
                    </ul>
                </li>
                
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            
            <!--ログアウト中のナビゲーションバー-->
            @else
                <li class="nav-item"><a href="{{ route("login") }}" class="nav-link"><i class="fas fa-sign-in-alt mr-1"></i>ログイン</a></li>
                <li class="nav-item"><a href="{{ route("signup.get") }}" class="nav-link"><i class="fas fa-user-plus mr-1"></i>新規登録</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            @endif
        </ul>
    </div>
</nav>