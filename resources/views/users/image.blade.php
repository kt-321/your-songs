<figure class="user-image text-center m-0">
    @if($user->image_url)       
        <img src="{{ $user->image_url }}" alt="アイコン" class="img-thumbnail" style="width: 150px; height: 150px;">
    @elseif($user->gender == 1)
        <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/man.jpeg" alt="アイコン" class="img-thumbnail" style="width: 150px; height: 150px;">
    @elseif($user->gender == 2)
        <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/woman.jpeg" alt="アイコン" class="img-thumbnail" style="width: 150px; height: 150px;">
    @else    
        <img src="https://original-yoursongs.s3-ap-northeast-1.amazonaws.com/qustion-mark.jpeg" alt="アイコン" class="img-thumbnail" style="width: 150px; height: 150px;">
    @endif
   
    <figcaption>
        @if(Auth::id() == $user->id)
        <div class="mt-2">
            <a href="{{ route("users.userImages", ["id" => $user->id]) }}" class="btn btn-primary btn-modify-profile">アイコンを変更</a>
            <h2 class="text-center">{{ $user->name }}</h2>
        </div>
        @endif
    </figcaption>
</figure>