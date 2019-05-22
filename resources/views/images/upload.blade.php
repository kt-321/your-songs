@extends("layouts.app")

@section("content")

{!! Form::open(["route" => "userImages.upload", "enctype"=>"multipart/form-data"]) !!}
    <div class="form-group row">
        {!! Form::label("file", "画像", ["class" => "col-form-label col-sm-2"]) !!}
        <div class="col-sm-10">
            {{Form::file("file", ["class" => "form-control"]) }}
        </div>
    
    {!! Form::submit("画像アップロード", ["class" => "btn btn-primary"]) !!}
    </div>
{!! Form::close() !!}

@if(session("s3url"))
    <h1>今アップロードしたファイル</h1>
    <img src="{{ session("s3url") }}">
@endif

{!! link_to_route("users.show", "戻る", ["user" => $user], ["class" => "btn btn-primary"]) !!}



@endsection