@extends("layouts.app")

@section("content")
    <h1 class="mb-4 text-center"><i class="fas fa-trophy mr-1"></i>人気曲ランキング</h1>
    <h2><i class="far fa-comments mr-1"></i>コメント数が多い順</h2>
    
    <ul class="nav nav-tabs nav-justified mb-3">
        <li class="nav-item"><a href="{{ url("favorites-ranking") }}" class="nav-link {{ Request::is("favorites-ranking") ? "active" : ""}}"><i class="fas fa-star mr-1"></i>お気に入り数が多い順</a></li>
        <li class="nav-item"><a href="{{ url("comments-ranking") }}" class="nav-link {{ Request::is("comments-ranking") ? "active" : ""}}"><i class="far fa-comments mr-1"></i>コメント数が多い順</a></li>
    </ul>  
    
    <form class="px-3">
        <div class="form-group">
            <div class="row m-0">
                <div class="col-sm-3 my-auto">
                    <label class="form-label m-0">年代</label>
                </div>
                
                <div class="col-sm-4">
                    <select name="music_age" class="form-control select select-primary mbl" data-toggle="select">
                        <option value="">全て</option>
                        <option value="1970" @if($music_age=="1970") selected @endif>1970年代</option>
                        <option value="1980" @if($music_age=="1980") selected @endif>1980年代</option>
                        <option value="1990" @if($music_age=="1990") selected @endif>1990年代</option>
                        <option value="2000" @if($music_age=="2000") selected @endif>2000年代</option>
                        <option value="2010" @if($music_age=="2010") selected @endif>2010年代</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="col-xs-offset-2 col-xs-10 text-center">
            <button type="submit" class="btn btn-default btn-success">絞り込む</button>
        </div>
    </form>
    
    <!--曲が見つからなかったときの表示-->
        @if(count($songs) == 0)
            <p class="text-center mt-3 mb-0">該当する曲は見つかりませんでした。</p>
        @endif   
    
    <!--ページネーション-->
        <div class="paginate text-center mt-3">
            {{ $songs->appends(["music_age"=>$music_age])->render("pagination::bootstrap-4") }}
        </div>
        
    @include("songs.songs", ["songs" => $songs])
@endsection