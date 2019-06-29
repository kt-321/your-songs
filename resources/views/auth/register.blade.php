@extends("layouts.app")

@section("content")
    <h1 class="text-center mb-4"><i class="fas fa-user-plus mr-2"></i>新規登録</h1>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            {!! Form::open(["route" => "signup.post"]) !!}
                <div class="form-group">
                    <i class="fas fa-user-circle mr-1"></i>
                    {!! Form::label("name", "名前") !!}
                    <span class="badge badge-pill badge-danger mb-2">必須</span>
                    {!! Form::text("name", old("name"), ["class" => "form-control"]) !!}
                </div>
                                
                <div class="form-group">
                    <i class="far fa-envelope mr-1"></i>
                    {!! Form::label("email", "メールアドレス") !!}
                    <span class="badge badge-pill badge-danger mb-2">必須</span>
                    {!! Form::email("email", old("email"), ["class" => "form-control"]) !!}
                </div>
                            
                <div class="form-group">
                    <i class="fas fa-unlock-alt mr-1"></i>
                    {!! Form::label("password", "パスワード") !!}
                    <span class="badge badge-pill badge-danger mb-2">必須</span>
                    {!! Form::password("password", ["class" => "form-control"]) !!}
                </div>
                                
                <div class="form-group">
                    <i class="fas fa-unlock-alt mr-1"></i>
                    {!! Form::label("password_confirmation", "パスワード（確認）") !!}
                    <span class="badge badge-pill badge-danger mb-2">必須</span>
                    {!! Form::password("password_confirmation", ["class" => "form-control"]) !!}
                </div>
                
               {!! Form::submit("上記の内容で登録", ["class" => "btn btn-primary btn-block"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection