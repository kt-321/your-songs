<div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body postion-relative w-100 m-10 p-0" style="height:40vh">
                    @if($user->image_url)       
                        <img src="{{ $user->image_url }}" alt="アイコン" class="img-fluid mh-100">
                    @elseif($user->gender == 1)
                        <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/man.jpeg" alt="画像" class="position-absolute w-100 h-auto mw-100 mh-100">
                    @else
                        <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/woman.jpeg" alt="画像" class="position-absolute w-100 h-auto mw-100 mh-100">
                    @endif
                </div>      
</div>