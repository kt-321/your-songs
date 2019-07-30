@extends("layouts.app")

@section("content")
            
            
    <h1 class="mb-4 text-center"><i class="far fa-clock mr-1"></i>タイムライン</h1>
 
    
    @include("songs.songs", ["songs" => $songs])

    <div class="my-3 mr-3 text-right">
        <a class="btn btn-light" href="#" v-scroll-to="toTop">ページのトップに戻る</a>
    </div>
@endsection