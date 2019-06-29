@extends("layouts.app")

@section("content")

    <h1 class="text-center mb-4">『{{ $song->song_name }}』の曲情報編集ページ</h1>
    
    <div class="row">
        <div class="edit-form col-sm-6 offset-sm-3">
            {!! Form::model($song, ["route" => ["songs.update", $song->id], "method" => "put"]) !!}
               
                @include("songs.form")
            
                {!! Form::submit("更新する", ["class" => "btn btn-primary d-block m-auto"]) !!}
                
            {!! Form::close() !!}
        </div>
    </div>

@endsection