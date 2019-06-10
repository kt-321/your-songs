    <div class="form-group row">
        {!! Form::label("song_name", "曲名", ["class" => "col-form-label col-sm-2"]) !!}
        <div class="col-sm-10">
            {!! Form::text("song_name", old("song_name"), ["class" => "form-control", "rows" => "1"]) !!}
        </div>
    </div>

    <div class="form-group row">
        {!! Form::label("artist_name", "アーティスト名", ["class" => "col-form-label col-sm-2"]) !!}
        <div class="col-sm-10">
            {!! Form::text("artist_name", old("artist_name"), ["class" => "form-control", "rows" => "1"]) !!}
        </div>
    </div>    
    
    <div class="form-group row">
        {!! Form::label("music_age", "曲の年代", ["class" => "col-form-label col-sm-2"]) !!}
        <div class="col-sm-3">
            {{ Form::select("music_age", [1980 => "1980年代", 1990 => "1990年代", 2000 => "2000年代", 2010 => "2010年代"],old("music_age"), ["class" => "form-control", "placeholder" => "－"]) }}
        </div>    
    </div>     
    
    <div class="form-group row">
        {!! Form::label("description", "曲の説明", ["class" => "col-form-label col-sm-2"]) !!}
        <div class="col-sm-10">
            {!! Form::textarea("description", old("description"), ["class" => "form-control", "rows" => "2"]) !!}
        </div>
    </div>
    
    <div class="form-group row">        
        {!! Form::label("video_url", "映像", ["class" => "col-form-label col-sm-2"]) !!}
        <div class="col-sm-10">
            https://www.youtube.com/watch?v=
            {!! Form::text("video_url", old("video_url"), ["class" => "form-control", "rows" => "1"]) !!}
            <p>アップしたいYouTube動画のURLのうち「v=」以降の文字列を打ち込んでください。</p>
        </div>
    </div>