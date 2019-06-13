@extends("layouts.app")

@section("content")

<h1 class="text-center mb-4"><i class="fas fa-search mr-1"></i>曲を探す</h1>

<!--検索フォーム-->
<div class="row mb-3">
    <!--<div class="col-md-4">   -->
    <div style="width: 100%;">   
        <form class="form-inline d-block text-center">
            <div class="form-group d-inline">
                <input style="width: 50%; " type="text" name="keyword" value="{{ $keyword }}"
                placeholder="曲名もしくはアーティスト名を入力">
                <input type="submit" value="検索" >
            </div>
        </form>
    </div>
</div>

<!--検索結果の表示-->
<div class="result">
    <!--該当する曲の数-->
    @if($keyword != "")
        @if(count($songs) > 0)
        <p class="text-center m-2">「{{ $keyword }}」の検索結果 {{ count($songs) }}曲</p>
        @else
        <p class="text-center m-2">該当する曲は見つかりませんでした。</p>
        @endif   
    @endif
    
    <!--該当する曲の一覧-->
    @if(count($songs) > 0)
    
    @include("songs.songs", ["songs" => $songs])
    
    @endif
</div>
@endsection