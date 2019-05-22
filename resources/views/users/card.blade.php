<div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body postion-relative w-100 m-10 p-0" style="height:40vh">
                    @if($user->image_url)       
                        <img src="{{ $user->image_url }}" alt="アイコン" class="position-absolute w-100 h-auto mw-100 mh-100">
                    @else
                        <img class="mr-2 rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
                    @endif
                </div>      
</div>