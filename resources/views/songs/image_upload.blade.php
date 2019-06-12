@extends("layouts.app")

@section("content")
    <!--曲画像-->
        <figure class="song-image text-center mb-5">
            @if($song->image_url)
                <img src="{{ $song->image_url }}" style="width:150px; height:150px;" class="img-thumbnail">
            @else
                <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/song.jpeg" style="width:150px; height:150px;" class="img-thumbnail">
            @endif
        
            <figcaption>
                <!--ログイン時、曲画像のアップロード-->
                <h3 class="song-name"><i class="fas fa-music mr-3"></i>{{ $song->song_name }}</h3>
                <div>
                    @if(Auth::id() == $song->user_id)
                        {!! Form::open(["route" => ["songs.songImagesUpload", $song->id], "enctype" => "multipart/form-data"]) !!}
                                {!! Form::label("file", "画像", ["class" => "col-form-label d-none"]) !!}
                                {!! Form::file("file", ["class" => "form-control d-inline-block mb-1", "style" => "width: 320px;"]) !!}
                            {!! Form::submit("選択した画像をアップロードする", ["class" => "btn btn-primary d-block m-auto"]) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </figcaption>
        </figure>

    <div class="text-center">
        <a href="{{ route("users.show", ["id" => $song->user->id]) }}" class="btn btn-secondary btn-modify-profile">マイページに戻る</a>
    </div>
@endsection