@extends("layouts.app")

@section("content")
    <h1>{{ $user->id }}の編集ページ</h1>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::model($user, ["route" => ["users.update", $user->id], "method" => "put"] ) !!}
            
                <div class="form-group">
                    {!! Form::label("name", "名前") !!}
                    {!! Form::text("name", old("name"), ["class" => "form-control"]) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label("email", "Ｅメール") !!}
                    {!! Form::email("email", old("email"), ["class" => "form-control"]) !!}
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
            
                {!! Form::submit("更新", ["class" => "btn btn-primary"]) !!}
                
            {!! Form::close() !!}
        </div>
    </div>
@endsection