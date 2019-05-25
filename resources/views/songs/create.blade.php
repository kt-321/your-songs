@extends("layouts.app")

@section("content")

<h1>おすすめ曲を投稿</h1>
@if (Auth::id() == $user->id)
{!! Form::open(["route" => "songs.store"]) !!}
    @include("songs.form")
    
    {!! Form::submit("投稿", ["class" => "btn btn-primary btn-block"]) !!}
{!! Form::close() !!}
@endif

@endsection