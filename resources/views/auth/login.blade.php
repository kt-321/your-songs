@extends("layouts.app")

@section("content")
    <div class="text-center mb-4">
        <h1><i class="fas fa-sign-in-alt mr-2"></i>ログイン</h1>
    </div>
   
    <div class="row"> 
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(["route" => "login.post"]) !!}
                <div class="form-group">
                    <i class="far fa-envelope mr-1"></i>
                    {!! Form::label("email", "メールアドレス") !!}
                    {!! Form::email("email", old("email"), ["class" => "form-control"]) !!}
                </div>
                <div class="form-group">
                    <i class="fas fa-unlock-alt mr-1"></i>
                    {!! Form::label("password", "パスワード") !!}
                    {!! Form::password("password", ["class" => "form-control"]) !!}
                </div>
                
                {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
            <p class="mt-2 mb-0"><a href="{{ url("signup") }}">新規登録</a></p>
            <p class="mt-2 mb-0"><a href="{{ url("password/reset") }}">パスワードを忘れた場合</a></p>
        </div>
    </div>
@endsection