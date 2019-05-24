@extends("layouts.app")

@section("content")

<h1>{{ $song->id }}の曲情報編集ページ</h1>

<div class="row">
    <div class="col-sm-6">
        {!! Form::model($song, ["route" => ["songs.update", $song->id], "method" => "put"]) !!}
           
            @include("songs.form")
        
            {!! Form::submit("更新", ["class" => "btn btn-primary"]) !!}
            
        {!! Form::close() !!}
    </div>
</div>

@endsection