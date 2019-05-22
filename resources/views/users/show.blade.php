@extends("layouts.app")

@section("content")
    <div class="row">
        <aside class="col-sm-4">
            @include("users.card", ["user" => $user])
            <!--<div class="card">-->
            <!--    <div class="card-header">-->
            <!--        <h3 class="card-title">{{ $user->name }}</h3>-->
            <!--    </div>-->
            <!--    <div class="card-body postion-relative w-100 m-10 p-0" style="height:40vh">-->
            <!--            <img src="{{ $user->image_url }}" alt="アイコン" class="position-absolute w-100 h-auto mw-100 mh-100">-->
                        
                        <!--<img src="{{ $user->image_url }}" alt="アイコン" class="position-absolute w-auto h-30 min-vw-30 min-vh-30" style="mw-inherit" >-->
                     <!--<img class="rounded imgfluid" src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/ycb1wcXq1Wc1c2s1oRLTxf2jG3XerEEupf45NbCv.jpeg">-->
                     <!--   <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt=""> -->
                <!--</div>-->
                <!--<img src="{{ $user->image_url }}" alt="アイコン" with="300px" height="300px">-->
                
           
                
                
            <!--</div>-->
            <div>
                 {!! link_to_route("userImages.uploadForm", "プロフィール画像", [], ["class" => "btn btn-primary"]) !!}
            </div>
           
           
           
            <!--@if(session("s3url"))-->
            <!--        <h1>今アップロードしたファイル</h1>-->
            <!--        <img src="{{ session("s3url") }}">-->
            <!--@endif-->
            
            <!--ユーザー情報-->
            <div class="user-profile">
                @include("users.profile")
            </div>
            
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
            @if (count($songs) > 0)
                @include("songs.songs", ["songs" => $songs])
            @endif 
        </div>
    </div>
@endsection