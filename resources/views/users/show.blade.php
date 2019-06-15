@extends("layouts.app")

@section("content")
    @if(Auth::id() == $user->id)
    <h1 class="mb-4 text-center"><i class="fas fa-user-circle mr-1"></i>マイページ</h1>
    @else
    <h1 class="mb-4 text-center"><i class="fas fa-user-circle mr-1"></i>{{ $user->name }}</h1>
    @endif
    
    <div class="user-profile mb-5">
        @include("users.image", ["user" => $user])
       
        <!--ユーザー情報-->
        <div class="status text-center mt-3" >
            <h4 class="mt-2"><i class="far fa-address-card mr-2"></i>プロフィール</h4>
            
            <ul class="status-list text-center px-3 py-3" style="list-style: none; display: table; margin: auto;">
                <li style="padding: 0 10px; display: table-cell;">
                    @if($user->gender == 1)
                    <div class="status-label">性別</div>
                    <div class="status-value">男性 </div>
                    @else
                    <div class="status-label">性別</div>
                    <div class="status-value">女性</div>
                    @endif
                </li>
                
                <li class="pl-8 ml-8"style="border-left: solid 1px #333; padding: 0 10px; display: table-cell;">
                    <div class="status-label">年齢</div>
                    <div class="status-value">{{ $user->age }}代</div>
                </li>
                
                @if($user->favorite_music_age)
                <li style="border-left: solid 1px #333; padding: 0 10px; display: table-cell;">
                    <div class="status-label">好きな年代</div>
                    <div class="status-value">{{ $user->favorite_music_age }}年代</div>
                </li>
                @endif
                
                @if($user->favorite_artist)
                <li style="border-left: solid 1px #333; padding: 0 10px; display: table-cell;">
                    <div class="status-label">お気に入り</div>
                    <div class="status-value">{{ $user->favorite_artist}}</div>
                </li>
                @endif
            </ul>
            
            @if($user->comment)
            <div class="status comment">
                <ul class="status-list p-3" style="list-style: none; text-align: center; display: table; margin: auto;">
                    <li style="padding: 0 8px; display: table-cell;">
                        <div class="status-label mb-1"><i class="fas fa-user mr-1"></i><i class="far fa-comment-dots mr-1"></i>自己紹介</div>
                        <div class="status-value" style="word-wrap: break-word;">{{ $user->comment }}</div>
                    </li>    
                </ul>
            </div>
            @endif  
            
            @if(Auth::id() == $user->id)
            <div class="status edit my-1">
                <a href="{{ route("users.edit", ["id" => $user->id]) }}" class="btn btn-primary btn-modify-profile">プロフィールを編集</a>
            </div>
            @endif
        </div>
    </div>     
    
    <!--フォローボタンまたはフォロー解除ボタン-->
    <div class="buttons-folloe-unfollow mb-3 text-center">
        @include("user_follow.follow_button", ["user" => $user])
    </div>
    
    <!--管理者としてログインしている場合に限りアカウントを削除できる-->
    @if(Auth::user()->role == 5 && Auth::id() !== $user->id)
    <div class="buttons-delete-user mb-3 text-center">
        <a class="btn btn-danger" href="/delete/{{ $user->id}}">このアカウントを削除</a>
    </div>
    @endif
       
    <div>
        @include("users.navtabs", ["user" => $user])
        @if (count($songs) > 0)
            @include("songs.songs", ["songs" => $songs])
        @endif 
    </div>
@endsection