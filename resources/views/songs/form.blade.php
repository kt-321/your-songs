<!--{!! Form::open(["route" => "songs.store"]) !!}-->
                    <div class="form-group row mb-0">
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
                            {{ Form::select("music_age", [1980 => "1980年代", 1990 => "1990年代", 2000 => "2000年代", 2010 => "2010年代"],old("music_age"), ["class" => "form-control"]) }}
                        </div>    
                    </div>     
                    
                    <div class="form-group row">
                        {!! Form::label("comment", "コメント", ["class" => "col-form-label col-sm-2"]) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea("comment", old("comment"), ["class" => "form-control", "rows" => "2"]) !!}
                        </div>
                    </div>
                         
                    <div class="form-group row">        
                        {!! Form::label("image_url", "画像", ["class" => "col-form-label col-sm-2"]) !!}
                        <div class="col-sm-10">
                            {{ Form::file('image_url', old("image_url"), ["class" => "form-control"]) }}
                        </div>
                    </div>
                    
                    
                    
                    <div class="form-group row">        
                        {!! Form::label("video_url", "映像", ["class" => "col-form-label col-sm-2"]) !!}
                        <div class="col-sm-10">
                            {!! Form::url("video_url", old("video_url"), ["class" => "form-control", "rows" => "2"]) !!}
                        </div>
                    </div>
                    
                    <!--{!! Form::submit("投稿", ["class" => "btn btn-primary btn-block"]) !!}-->
<!--{!! Form::close() !!}-->
