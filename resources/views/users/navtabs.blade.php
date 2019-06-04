<ul class="nav nav-tabs nav-justified mb-3">
    @if(Auth::id() == $user->id)
    <li class="nav-item"><a href="{{ route("users.show", ["id" => $user->id]) }}" class="nav-link {{ Request::is("users/" . $user->id) ? "active" : ""}}">私のおすすめ曲<span class="badge badge-secondary"> {{ $count_songs }}</span></a></li>
    @else
    <li class="nav-item"><a href="{{ route("users.show", ["id" => $user->id]) }}" class="nav-link {{ Request::is("users/" . $user->id) ? "active" : ""}}">おすすめ曲<span class="badge badge-secondary"> {{ $count_songs }}</span></a></li>
    @endif
    <li class="nav-item"><a href="{{ route("users.followings", ["id" => $user->id]) }}" class="nav-link {{ Request::is("users/*/followings") ? "active" : ""}}">フォロー中<span class="badge badge-secondary"> {{ $count_followings }}</span></a></li>
    <li class="nav-item"><a href="{{ route("users.followers", ["id" => $user->id]) }}" class="nav-link {{ Request::is("users/*/followers") ? "active" : ""}}">フォロワー<span class="badge badge-secondary">{{ $count_followers }}</span></a></li>
    <li class="nav-item"><a href="{{ route("users.favorites", ["id" => $user->id])}}" class="nav-link {{ Request::is("users/*/favorites") ? "active" : ""}}">お気に入り <span class="badge badge-secondary">{{ $count_favorites }}</span></a></li>
</ul>