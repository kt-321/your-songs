@extends("layouts.app")

@section("content")
            
            @if(Auth::id() == $user->id)
            <h1 class="mb-4 text-center page-title"><i class="fas fa-user-circle mr-1"></i>マイページ</h1>
            @else
            <h1 class="mb-4 text-center page-title"><i class="fas fa-user-circle mr-1"></i>{{ $user->name }}</h1>
            @endif
    
            <div class="user-profile mb-5">
                @include("users.image", ["user" => $user])
               
                <!--ユーザー情報-->
                <div class="status text-center" >
                    <h4 class="mt-2"><i class="far fa-address-card mr-2"></i>プロフィール</h4>
                    
                    <ul class="status-list text-center px-3 py-3" style="list-style: none; display: table; margin: auto;">
                        <li style="padding: 0 10px; display: table-cell;">
                            <div class="status-label">性別</div>
                            @if($user->gender == 1)
                            <div class="status-value">男性 </div>
                            @elseif($user->gender == 2)
                            <div class="status-value">女性</div>
                            @else
                            <div class="status-value">？</div>
                            @endif
                        </li>
                        
                        <li class="pl-8 ml-8"style="border-left: solid 1px #333; padding: 0 10px; display: table-cell;">
                            <div class="status-label">年齢</div>
                            @if($user->age)
                            <div class="status-value">{{ $user->age }}代</div>
                            @else
                            <div>？</div>
                            @endif
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
                                <div class="status-label mb-2"><i class="fas fa-user mr-1"></i><i class="far fa-comment-dots mr-1"></i>自己紹介</div>
                                <div class="status-value self-introduction1 mx-0 my-auto">
                                    <p style="word-wrap: break-word;">{{ $user->comment }}</p>
                                </div>
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
            <div class="buttons-under-profile mb-3 text-center">
                @include("user_follow.follow_button", ["user" => $user])
            </div>
               
            <div>
                @include("users.navtabs", ["user" => $user])
                @include("songs.songs", ["songs" => $songs])
            </div>
            
            <div class="my-3 mr-3 text-right">
                <a class="btn btn-light" href="#" v-scroll-to="toTop">ページのトップに戻る</a>
            </div>
                    
    @endsection