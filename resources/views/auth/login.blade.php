@extends("layouts.app")

@section("content")
    <div class="text-center mb-3">
        <h1 class="page-title"><i class="fas fa-sign-in-alt mr-2"></i>ログイン</h1>
    </div>
   
    <div class="row"> 
        <div class="col-sm-6 offset-sm-3">
            <div class="how-to-test-login border text-center p-2 mb-3">
                <p>テストユーザーとしてログインする場合</p>
                <ul class="list-unstyled m-0">
                    <li>メールアドレス：test@example.com</li>
                    <li>パスワード：testtest</li>
                </ul>
            </div>
            
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
                
                {!! Form::submit('ログイン', ['class' => 'btn-login btn btn-primary btn-block']) !!}
            {!! Form::close() !!}
            
            <a href="/login/facebook" class="btn-facebook btn btn-block mt-4"><i class="fab fa-facebook-square mr-1"></i>Facebookアカウントでログイン</a>
            <a href="/login/github" class="btn-github btn btn-default btn-block"><i class="fab fa-github mr-1"></i>Githubアカウントでログイン</a>
            <a href="/login/twitter" class="btn-twitter btn btn-block"><i class="fab fa-twitter-square mr-1"></i>Twitterアカウントでログイン</a>
            
            <p class="mt-2 mb-0"><a href="{{ url("signup") }}">新規登録</a></p>
            <p class="mt-2 mb-0"><a href="{{ url("password/reset") }}">パスワードを忘れた場合</a></p>
        </div>
    </div>
@endsection