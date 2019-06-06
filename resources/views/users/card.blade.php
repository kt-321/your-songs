<figure class="user-image">
   @if($user->image_url)       
        <img src="{{ $user->image_url }}" alt="アイコン" class="img-thumbnail">
    @elseif($user->gender == 1)
        <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/man.jpeg" alt="アイコン" class="img-thumbnail">
    @else
        <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/woman.jpeg" alt="アイコン" class="img-thumbnail">
    @endif
   
    <figcaption>
        <h3 class="user-name m-2 text-center" style="30px">{{ $user->name }}</h3>
        
        <div>
            @if(Auth::id() == $user->id) 
            {!! Form::open(["route" => "userImages.upload", "enctype" => "multipart/form-data"]) !!}
            <div class="form-group">
                <div class="row">
                    {!! Form::label("file", "画像", ["class" => "col-form-label col-sm-2"]) !!}
                    <div class="col-sm-10">
                    {{Form::file("file", ["class" => "form-control"])}}
                    </div>
                </div>
                {!! Form::submit("アイコンを変更", ["class" => "btn btn-primary"]) !!}
            </div>
            {!! Form::close() !!}
            @endif
        </div>
    </figcaption>
</figure>