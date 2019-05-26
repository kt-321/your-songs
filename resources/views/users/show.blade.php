@extends("layouts.app")

@section("content")
    <div class="row">
        <aside class="col-sm-4">
            @include("users.card", ["user" => $user])
            
            <div>
                @if(Auth::id() == $user->id) 
                 {!! Form::open(["route" => "userImages.upload", "enctype" => "multipart/form-data"]) !!}
                <div class="form-group row">
                    {!! Form::label("file", "画像", ["class" => "col-form-label col-sm-2"]) !!}
                    <div class="col-sm-10">
                    {{Form::file("file", ["class" => "form-control"])}}
                    </div>
                    {!! Form::submit("プロフィール画像", ["class" => "btn btn-primary"]) !!}
                </div>
                {!! Form::close() !!}
                @endif
                 
            </div>
           
            <!--ユーザー情報-->
            <div class="user-profile">
                @include("users.profile")
            </div>
            
            @if(Auth::id() == $user->id)
                <a href="{{ route("users.edit", ["id" => $user->id]) }}" class="btn btn-primary">プロフィールを変更</a>
            @endif
            
            <!--フォローボタンまたはフォロー解除ボタン-->
            @include("user_follow.follow_button", ["user" => $user])
            
            <!--曲投稿-->
            @if(Auth::id() == $user->id)
                <a href="{{ route("songs.create") }}" class="btn btn-lg btn-primary">おすすめ曲を投稿</a>
            @endif
        </aside>
        
        <div class="col-sm-8">
            @include("users.navtabs", ["user" => $user])
            @if (count($songs) > 0)
                @include("songs.songs", ["songs" => $songs])
            @endif 
        </div>
    </div>
@endsection