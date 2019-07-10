@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="mx-0 mb-3 p-2 border row">
                <div class="col-sm-4 media">
                    <div class="media-left my-auto">
                        <figure class="text-center m-0">
                            @if($user->image_url)
                                <img src="{{ $user->image_url }}" alt="アイコン" class="circle2"> 
                            @elseif($user->gender == 1)
                                <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/man.jpeg" alt="アイコン" class="circle2">
                            @elseif($user->gender == 2)
                                <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/woman.jpeg" alt="アイコン" class="circle2">
                            @else    
                                <img src="https://original-yoursongs.s3-ap-northeast-1.amazonaws.com/qustion-mark.jpeg" alt="アイコン" class="circle2">
                            @endif
                            <figcaption class="text-center m-0">
                                <a href="{{ route("users.show", ["id" => $user->id]) }}">{{ $user->name }}</a>
                            </figcaption>
                        </figure>
                    </div>
                    
                    <div class="media-body ml-3 my-auto">
                        @if($user->age)
                        <p class="mb-0">{!! nl2br(e($user->age)) !!}代</p>
                        @else
                        <p class="mb-0"></p>
                        @endif
                        
                        @if($user->gender == 1)
                        <p class="mb-0">男性 </p>
                        @elseif($user->gender == 2)
                        <p class="mb-0">女性 </p>
                        @endif
                        
                        @if($user->favorite_music_age)
                        <p class="mb-0">{!! nl2br(e($user->favorite_music_age)) !!}年代の音楽が好き</p>
                        @endif
                       
                        @if($user->favorite_artist)
                        <p class="mb-0">好きなミュージシャン：{!! nl2br(e($user->favorite_artist)) !!}</p>
                        @endif
                    </div>
                </div>
                
                <!--フォロー・アンフォローボタンとプロフィールを見るボタン-->
                <div class="col-sm-3 my-auto">
                    
                    <!--自己紹介-->
                    <div class ="balloon1-left" style="word-wrap: break-word;">
                        @if($user->comment)
                        <p class="mb-0">{{ $user->comment }}</p>
                        @else
                        <p>．．．</p>
                        @endif
                    </div>
                    
                    <div>
                        <div style="display:inline-block">
                            @include("user_follow.follow_button", ["user" => $user])
                        </div>
                        <a class="btn btn-success btn-sm" href="{{ route("users.show", ["id" => $user->id]) }}">プロフィール</a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>

    {{ $users->render("pagination::bootstrap-4") }}
@endif