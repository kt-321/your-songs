@extends("layouts.app")

@section("content")
    <div class="row">
        <aside class="col-sm-4">
            @include("users.card", ["user" => $user])
           
            <!--ユーザー情報-->
            <div class="user-profile border p-3 mb-5">
                @include("users.profile")
                <!--プロフィール変更-->
                @if(Auth::id() == $user->id)
                    <a href="{{ route("users.edit", ["id" => $user->id]) }}" class="btn btn-primary btn-modify-profile">プロフィールを編集</a>
                @endif
            </div>
            
            <div class="buttons-under-profile">
                @include("users.buttons_under_profile")
            </div>
            
        </aside>
        
        <div class="col-sm-8">
            @include("users.navtabs", ["user" => $user])
            @if (count($songs) > 0)
                @include("songs.songs", ["songs" => $songs])
            @endif 
        </div>
    </div>
@endsection