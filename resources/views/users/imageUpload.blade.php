@extends("layouts.app")

@section("content")
    <figure class="user-image text-center mb-5">
        @if($user->image_url)       
            <img src="{{ $user->image_url }}" alt="アイコン" class="img-thumbnail" style="width: 150px; height: 150px;">
        @elseif($user->gender == 1)
            <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/man.jpeg" alt="アイコン" class="img-thumbnail" style="width: 150px; height: 150px;">
        @else
            <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/woman.jpeg" alt="アイコン" class="img-thumbnail" style="width: 150px; height: 150px;">
        @endif
       
        <figcaption>
            <h3 class="user-name">{{ $user->name }}</h3>
            <div>
                @if(Auth::id() == $user->id) 
                {!! Form::open(["route" => ["users.userImagesUpload", $user->id], "enctype" => "multipart/form-data"]) !!}
                        {!! Form::label("file", "画像", ["class" => "col-form-label d-none"]) !!}
                        {!! Form::file("file", ["class" => "form-control d-inline-block mb-1", "style" => "width: 320px;"]) !!}
                    {!! Form::submit("選択した画像をアップする", ["class" => "btn btn-primary d-block m-auto"]) !!}
                {!! Form::close() !!}
                @endif
            </div>
        </figcaption>
    </figure>

    <div class="text-center">
        <a href="{{ route("users.show", ["id" => $user->id]) }}" class="btn btn-secondary btn-modify-profile">マイページに戻る</a>
    </div>
@endsection