@extends("layouts.app")

@section("content")
    <div class="text-center">
        <h1>ユーザー登録</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(["route" => "signup.post"]) !!}
            
                @include("users.form")
                
               {!! Form::submit("Sign up", ["class" => "btn btn-primary btn-block"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection