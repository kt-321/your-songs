@extends("layouts.app")

@section("content")

<h1 class="text-center mb-4"><i class="fas fa-plus-circle mr-2"></i>おすすめ曲を投稿</h1>
@if (Auth::id() == $user->id)
<div class="create-form mx-3">
    {!! Form::open(["route" => "songs.store"]) !!}
        @include("songs.form")
        {!! Form::submit("投稿", ["class" => "btn btn-primary btn-lg", "style" => "display: block; margin: auto;"]) !!}
    {!! Form::close() !!}
</div>
@endif

@endsection