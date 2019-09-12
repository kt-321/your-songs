 @if($user->image_url)
                <img src="{{ $user->image_url }}" style="width: 50px; height: 50px" alt="アイコン">
                @else
                    @if($user->gender == 1)
                    <img src="https://your-songs-laravel.s3-ap-northeast-1.amazonaws.com/man.jpeg" style="width: 50px; height: 50px" >
                    @elseif($user->gender == 2)
                    <img src="https://your-songs-laravel.s3-ap-northeast-1.amazonaws.com/woman.jpeg" style="width: 50px; height: 50px" >
                    @endif
                @endif
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        <a href="{{ route("users.show", ["id" => $user->id]) }}">プロフィールを見る</a>
                    </div>
                </div>