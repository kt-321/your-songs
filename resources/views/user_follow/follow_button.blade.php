@if (Auth::id() != $user->id )
    @if (Auth::user()->is_following($user->id))
        {!! Form::open(["route" => ["user.unfollow", $user->id], "method" => "delete"]) !!}
            {!! Form::submit("フォロー中", ["class" => "btn btn-danger btn-sm btn-unfollow"]) !!}
        {!! Form::close() !!}
    @else
        {!! Form::open(["route" => ["user.follow", $user->id]]) !!}
            {!! Form::submit("フォロー", ["class" => "btn btn-primary btn-sm btn-follow"]) !!}
        {!! Form::close() !!}
    @endif
@endif