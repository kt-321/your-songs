<!--フォローボタンまたはフォロー解除ボタン-->
@include("user_follow.follow_button", ["user" => $user])

<!--曲投稿-->
@if(Auth::id() == $user->id)
    <a href="{{ route("songs.create") }}" class="btn btn-lg btn-primary d-block mb-5">新しい曲を投稿</a>
@endif