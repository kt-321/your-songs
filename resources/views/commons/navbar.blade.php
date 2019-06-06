<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="/">YourSongs</a>
    
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="nav-bar">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav">
            <!--ログイン中のナビゲーションバー-->
            @if (Auth::check())
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-trophy"></i>ランキング</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item"><a href="{{ url("/favoritesRanking/all") }}">お気に入り数順</a></li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item"><a href="{{ url("/commentsRanking/all") }}">コメント数順</a></li>
                    </ul>
                </li>  
                
                <li class="nav-item"><a href="{{ url("/users") }}" class="nav-link"><i class="fas fa-user"></i>ユーザー</a></li>
                
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user()->image_url)  
                        <img src="{{ Auth::user()->image_url }}" alt="アイコン" class="img-fluid mh-100" style="height: 2.8vh; width: 2.8vh;">
                        @endif
                        {{ Auth::user()->name }}
                        
                    </a>
                    
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item">{!! link_to_route("users.show", "マイページ", ["id" => Auth::id()]) !!}</li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item">{!! link_to_route("logout.get", "ログアウト") !!}</li>
                    </ul>
                </li>
                
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            
            <!--ログアウト中のナビゲーションバー-->
            @else
                <li class="nav-item"><a href="{{ route("login") }}" class="nav-link">ログイン</a></li>
                <li class="nav-item"><a href="{{ route("signup.get") }}" class="nav-link">新規登録</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            @endif
        </ul>
    </div>
</nav>