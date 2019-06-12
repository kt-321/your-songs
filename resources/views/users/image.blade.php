<figure class="user-image text-center m-0">
    @if($user->image_url)       
        <img src="{{ $user->image_url }}" alt="アイコン" class="img-thumbnail" style="width: 150px; height: 150px;">
    @elseif($user->gender == 1)
        <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/man.jpeg" alt="アイコン" class="img-thumbnail" style="width: 150px; height: 150px;">
    @else
        <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/woman.jpeg" alt="アイコン" class="img-thumbnail" style="width: 150px; height: 150px;">
    @endif
   
    <figcaption>
        @if(Auth::id() == $user->id)
        <div class="mt-2">
            <a href="{{ route("users.userImages", ["id" => $user->id]) }}" class="btn btn-primary btn-modify-profile">アイコンを変更する</a>
            <h1 class="text-center">{{ $user->name }}</h1>
        </div>
        @endif
    </figcaption>
</figure>