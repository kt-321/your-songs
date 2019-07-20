@extends('layouts.app')

@section('content')
    <div class="row m-0">
        <div class="col-md-8 offset-md-2">
            <div class="panel panel-default">
                <div class="panel-heading mb-4">
                    <h1 class="mb-4 text-center page-title"><i class="fas fa-cog mr-1"></i>パスワードの再設定</h1>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} text-center">
                            <label for="email">登録したメールアドレスを入力してください。</label>

                            <div class="col-md-8 offset-md-2">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    メールを送る
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
