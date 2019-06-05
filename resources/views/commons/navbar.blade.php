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
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">人気曲ランキング</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item"><a href="{{ url("/favoritesRanking/all") }}">お気に入り数順</a></li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item"><a href="{{ url("/commentsRanking/all") }}">コメント数順</a></li>
                    </ul>
                </li>  
                <li class="nav-item">{!! link_to_route("users.index", "ユーザー一覧", [],["class" => "nav-link"] ) !!}</li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li class="dropdown-item">{!! link_to_route("users.show", "マイプロフィール", ["id" => Auth::id()]) !!}</li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-item">{!! link_to_route("logout.get", "ログアウト") !!}</li>
                    </ul>
                </li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            
            <!--ログアウト中のナビゲーションバー-->
            @else
                <li class="nav-item"><a href="{{ route("signup.get") }}" class="nav-link">Signup</a></li>
                <li class="nav-item"><a href="{{ route("login") }}" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
            @endif
        </ul>
    </div>
</nav>