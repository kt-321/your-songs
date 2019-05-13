@if (Auth::user()->is_favoriting($song->id))
    {!! Form::open(["route" => ["favorites.unfavorite", $song->id], "method" => "delete"]) !!}
        {!! Form::submit("お気に入りから外す", ["class" => "btn btn-warning btn-sm"]) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(["route" => ["favorites.favorite", $song->id]]) !!}
        {!! Form::submit("お気に入りに登録", ["class" => "btn btn-success btn-sm "]) !!}
    {!! Form::close() !!}
@endif