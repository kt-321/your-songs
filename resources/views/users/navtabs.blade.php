<ul class="nav nav-tabs nav-justified mb-3">
    @if(Auth::id() == $user->id)
    <li class="nav-item"><a href="{{ route("users.show", ["id" => $user->id]) }}" class="nav-link {{ Request::is("users/" . $user->id) ? "active" : ""}}"><i class="fas fa-music"></i> 私のおすすめ曲 <span class="badge badge-pill badge-info"> {{ $count_songs }}</span></a></li>
    @else
    <li class="nav-item"><a href="{{ route("users.show", ["id" => $user->id]) }}" class="nav-link {{ Request::is("users/" . $user->id) ? "active" : ""}}"><i class="fas fa-music"></i> おすすめ曲 <span class="badge badge-pill badge-info">{{ $count_songs }}</span></a></li>
    @endif
    <li class="nav-item"><a href="{{ route("users.followings", ["id" => $user->id]) }}" class="nav-link {{ Request::is("users/*/followings") ? "active" : ""}}"><i class="fas fa-user"></i> フォロー中 <span class="badge badge-pill badge-info">{{ $count_followings }}</span></a></li>
    <li class="nav-item"><a href="{{ route("users.followers", ["id" => $user->id]) }}" class="nav-link {{ Request::is("users/*/followers") ? "active" : ""}}"><i class="fas fa-user"></i> フォロワー <span class="badge badge-pill badge-info">{{ $count_followers }}</span></a></li>
    <li class="nav-item"><a href="{{ route("users.favorites", ["id" => $user->id])}}" class="nav-link {{ Request::is("users/*/favorites") ? "active" : ""}}"><i class="fas fa-star"></i> お気に入り <span class="badge badge-pill badge-info">{{ $count_favorites }}</span></a></li>
</ul>