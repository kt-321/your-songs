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
        
        <header>
            <!--<button type="button" onclick=history.back()>戻る</button> -->
        </header>
        
        <div class="container p-4">
            @include("commons.error_messages")
            
            <h1 class="text-center mb-4"><i class="fas fa-user-edit mr-2"></i>プロフィールの編集</h1>
            
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    {!! Form::model($user, ["route" => ["users.update", $user->id], "method" => "put"] ) !!}
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
                            {!! Form::label("age", "年齢") !!}
                            {!! Form::select("age", [10 => "10代", 20 => "20代", 30 => "30代", 40 => "40代", 50 => "50代", 60 => "60代", 70 => "70代"], old("age"), ["placeholder" => "－"]) !!}
                        </div>
                                        
                        <div class="form-group">
                            {!! Form::label("gender", "性別") !!}
                            {!! Form::select("gender", [1 => "男性", 2 => "女性"], old("gender"), ["placeholder" => "－"]) !!}
                        </div>
                                        
                        <div class="form-group">
                            {!! Form::label("favorite_music_age", "好きな音楽の年代") !!}
                            {!! Form::select("favorite_music_age", [1970 => "1970年代", 1980 => "1980年代", 1990 => "1990年代", 2000 => "2000年代", 2010 => "2010年代"], old("favorite_music_age"), ["placeholder" => "－"]) !!}
                        </div>
                                        
                        <div class="form-group">
                            {!! Form::label("favorite_artist", "好きなミュージシャン") !!}
                            {!! Form::text("favorite_artist", old("favorite_artist"), ["class" => "form-control"]) !!}
                        </div>
                                        
                        <div class="form-group">
                            <i class="fas fa-user mr-1"></i><i class="far fa-comment-dots mr-1"></i>
                            {!! Form::label("comment", "自己紹介") !!}
                            {!! Form::textarea("comment", old("comment"), ["class" => "form-control"]) !!}
                        </div>
                    
                        {!! Form::submit("更新", ["class" => "btn btn-primary d-block m-auto"]) !!}
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        
        <footer class="bg-dark mt-5">
            <small>&copy; 2019 YourSongs</small>
        </footer>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>