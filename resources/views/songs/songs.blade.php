<ul class="media-list">
    @foreach($songs as $song)
    <li class="media mb-3">
        <img class="mr-2 rounded" src="{{ Gravatar::src($song->user->email, 50) }}" alt="">
        <div class="media-body">
            <div>
                {!! link_to_route("users.show", $song->user->name, ["id" => $song->user->id]) !!}<span class="text-muted"> posted at {{ $song->created_at }}</span>
            </div>
            
            <!--曲情報-->
            <div>
                <p class="mb-0">曲名：{!! nl2br(e($song->song_name)) !!}</p>
                <p class="mb-0">アーティスト名：{!! nl2br(e($song->artist_name)) !!}</p>
                <p class="mb-0">曲の年代：{!! nl2br(e($song->music_age)) !!}年代</p>
                <p class="mb-0">コメント：{!! nl2br(e($song->comment)) !!}</p>
                <p class="mb-0">画像：{!! nl2br(e($song->image_url)) !!}</p>
                <p class="mb-0">映像：<a href ="{!! nl2br(e($song->video_url)) !!}">{!! nl2br(e($song->video_url)) !!}</a></p>
            </div>
            <div>
                @if(Auth::id() == $song->user_id)
                    {!! Form::open(["route" => ["songs.destroy", "$song->id"], "method" => "delete" ]) !!}
                        {!! Form::submit("削除", ["class" => "btn btn-danger btn-sm"]) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </li>
    @endforeach
</ul>
{{ $songs->render("pagination::bootstrap-4") }}