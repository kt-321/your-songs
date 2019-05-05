@extends("layouts.app")

@section("content")
    <div class="text-center">
        <h1>Sign up</h1>
    </div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
           
            {!! Form::open(["route" => "signup.post"]) !!}
                <div class="form-group">
                    {!! Form::label("name", "名前") !!}
                    {!! Form::text("name", old("name"), ["class" => "form-control"]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label("email", "Ｅメール") !!}
                    {!! Form::email("email", old("email"), ["class" => "form-control"]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label("password", "パスワード") !!}
                    {!! Form::password("password", ["class" => "form-control"]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label("password_confirmation", "パスワード（確認）") !!}
                    {!! Form::password("password_confirmation", ["class" => "form-control"]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label("age", "年齢") !!}
                    {!! Form::select("age", [10 => "10代", 20 => "20代", 30 => "30代", 40 => "40代", 50 => "50代", 60 => "60代", 70 => "70代"], [], ["placeholder" => "選択してください"]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label("gender", "性別") !!}
                    {!! Form::select("gender", [1 => "男性", 2 => "女性"], [], ["placeholder" => "選択してください"]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label("image_url", "アイコン（任意）") !!}
                    {{ Form::file("image_url") }}
                </div>
                
                <div class="form-group">
                    {!! Form::label("favorite_music_age", "好きな音楽の年代（任意）") !!}
                    {!! Form::select("favorite_music_age", [1970 => "1970年代", 1980 => "1980年代", 1990 => "1990年代", 2000 => "2000年代", 2010 => "2010年代"], [], ["placeholder" => "選択してください"]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label("favorite_artist", "好きなミュージシャン（任意）") !!}
                    {!! Form::text("favorite_artist", old("favorite_artist"), ["class" => "form-control"]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label("comment", "自由コメント（任意）") !!}
                    {!! Form::textarea("comment", old("comment"), ["class" => "form-control"]) !!}
                </div>
                
                
                {!! Form::submit("Sign up", ["class" => "btn btn-primary btn-block"]) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection