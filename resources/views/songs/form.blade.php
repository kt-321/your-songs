    <div class="form-group">
        <i class="fas fa-music mr-1"></i>
        {!! Form::label("song_name", "タイトル") !!}
        <span class="badge badge-pill badge-danger">必須</span>
        {!! Form::text("song_name", old("song_name"), ["class" => "form-control"]) !!}
    </div>

    <div class="form-group">
        <i class="fas fa-guitar mr-1"></i>
        {!! Form::label("artist_name", "アーティスト名") !!}
        <span class="badge badge-pill badge-danger">必須</span>
        {!! Form::text("artist_name", old("artist_name"), ["class" => "form-control"]) !!}
    </div>    
    
    <div class="form-group">
        <i class="fas fa-history mr-1"></i>
        {!! Form::label("music_age", "年代") !!}
        <span class="badge badge-pill badge-danger">必須</span>
           {{ Form::select("music_age", [1970 => "1970年代", 1980 => "1980年代", 1990 => "1990年代", 2000 => "2000年代", 2010 => "2010年代"],old("music_age"), ["class" => "form-control", "placeholder" => "－"]) }}
    </div>     
    
    <div class="form-group">
        <i class="far fa-comments mr-1"></i>
        {!! Form::label("description", "曲の説明（200字以内）") !!}
            {!! Form::textarea("description", old("description"), ["class" => "form-control", "rows" => "5"]) !!}
    </div>
    
    <div class="form-group">   
        <i class="fab fa-youtube mr-1"></i>
        {!! Form::label("video_url", "映像") !!}
        <div>https://www.youtube.com/watch?v=
            {!! Form::text("video_url", old("video_url"), ["class" => "form-control"]) !!}
            <p>アップしたいYouTube動画のURLのうち「v=」以降の文字列を打ち込んでください。</p>
        </div>
    </div>