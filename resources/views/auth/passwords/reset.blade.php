<<<<<<< HEAD
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
=======
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>YourSongs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="../../css/style.css" type="text/css" rel="stylesheet">
    </head>


    <body>
    @include("commons.navbar")
    
    <div class="container p-4">
        <div class="row m-0">
            <div class="col-md-10 offset-md-1">
                <div class="panel panel-default">
                    <div class="panel-heading mb-4">
                        <h1 class="text-center page-title"><i class="fas fa-cog mr-1"></i>パスワードの再設定</h1>
                    </div>
    
                    <div class="panel-body">
                        @if (session("status"))
                        <div class="alert alert-success">
                            {{ session("reset") }}
                        </div>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ route("password.request") }}">
                            {{ csrf_field() }}
    
                            <input type="hidden" name="token" value="{{ $token }}">
    
                            <div class="form-group{{ $errors->has("email") ? " has-error" : "" }}">
                                <label for="email" class="col-md-4 offset-md-3 control-label"><i class="far fa-envelope mr-1"></i>登録済みのメールアドレス</label>
    
                                <div class="col-md-6 offset-md-3">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $email) }}" required autofocus>
                                    <!--<input id="email" type="email" class="form-control" name="email" value="{{ old("email") }}" required autofocus>-->
    
                                    @if ($errors->has("email"))
                                        <span class="help-block">
                                            <strong>{{ $errors->first("email") }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has("password") ? " has-error" : "" }}">
                                <label for="password" class="col-md-4 offset-md-3 control-label"><i class="fas fa-unlock-alt mr-1"></i>新しいパスワード</label>
    
                                <div class="col-md-4 offset-md-3">
                                    <input id="password" type="password" class="form-control" name="password" required>
    
                                    @if ($errors->has("password"))
                                        <span class="help-block">
                                            <strong>{{ $errors->first("password") }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has("password_confirmation") ? " has-error" : "" }}">
                                <label for="password-confirm" class="col-md-6 offset-md-3 control-label"><i class="fas fa-unlock-alt mr-1"></i>新しいパスワード（確認用）</label>
                                <div class="col-md-4 offset-md-3">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
    
                                    @if ($errors->has("password_confirmation"))
                                        <span class="help-block">
                                            <strong>{{ $errors->first("password_confirmation") }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">
                                        以上のパスワードに変更
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
>>>>>>> 2218242164d467f1ea1b9b4e4036f55066e5b488
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</div>
@endsection
=======
    
    
    
    <footer class="mt-5">
        <small>&copy; 2019 YourSongs</small>
    </footer>
             
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>

>>>>>>> 2218242164d467f1ea1b9b4e4036f55066e5b488
