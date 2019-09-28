@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
=======
    <div class="row m-0">
        <div class="col-md-8 offset-md-2">
            <div class="panel panel-default">
                <div class="panel-heading mb-4">
                    <h1 class="mb-4 text-center page-title"><i class="fas fa-cog mr-1"></i>パスワードの再設定</h1>
                </div>
>>>>>>> 2218242164d467f1ea1b9b4e4036f55066e5b488

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

<<<<<<< HEAD
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
=======
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} text-center">
                            <label for="email">登録したメールアドレスを入力してください。</label>

                            <div class="col-md-8 offset-md-2">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
>>>>>>> 2218242164d467f1ea1b9b4e4036f55066e5b488
                            </div>
                        </div>

                        <div class="form-group">
<<<<<<< HEAD
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
=======
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    メールを送る
>>>>>>> 2218242164d467f1ea1b9b4e4036f55066e5b488
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</div>
=======
>>>>>>> 2218242164d467f1ea1b9b4e4036f55066e5b488
@endsection
