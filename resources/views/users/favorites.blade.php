@extends("layouts.app")

@section("content")
    <div class="row">
        <aside class="col-sm-4">
            @include("users.card", ["user" => $user])
            
            <div>
                 {!! link_to_route("userImages.uploadForm", "プロフィール画像", [], ["class" => "btn btn-primary"]) !!}
            </div>
            
            @include("users.profile")
            
            @if(Auth::id() == $user->id)
                {!! link_to_route("users.edit", "プロフィールを変更", ["id" => $user->id], ["class" => "btn btn-primary"]) !!}
            @endif
            
            <!--フォローボタンまたはフォロー解除ボタン-->
            @include("user_follow.follow_button", ["user" => $user])
            
            <!--曲投稿-->
            @if(Auth::id() == $user->id)
                {!! link_to_route("songs.create", "曲を投稿", [], ["class" => "btn btn-lg btn-primary"]) !!}
            @endif
        </aside>
        
        <div class="col-sm-8">
            @include("users.navtabs", ["user" => $user])
            @include("songs.songs", ["songs" => $songs])
        </div>
    </div>
@endsection