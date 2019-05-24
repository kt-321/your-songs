@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media">
                @if($user->image_url)
                <img src="{{ $user->image_url }}" style="width: 50px; height: 50px" alt="アイコン">
                @else
                    @if($user->gender == 1)
                    <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/man.jpeg" style="width: 50px; height: 50px" >
                    @elseif($user->gender == 2)
                    <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/woman.jpeg" style="width: 50px; height: 50px" >
                    @endif
                @endif
                <div class="media-body">
                    <div>
                        {{ $user->name }}
                    </div>
                    <div>
                        <p>{!! link_to_route("users.show", "View Profile", ["id" => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{ $users->render("pagination::bootstrap-4") }}
@endif