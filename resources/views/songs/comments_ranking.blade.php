@extends("layouts.app")

@section("content")
    <h1 class="mb-4 text-center"><i class="fas fa-trophy mr-1"></i>人気曲ランキング</h1>
    <h2><i class="far fa-comments mr-1"></i>コメント数が多い順</h2>
    
    <ul class="nav nav-tabs nav-justified mb-3">
        <li class="nav-item"><a href="{{ url("favoritesRanking/all") }}" class="nav-link {{ Request::is("favoritesRanking/*") ? "active" : ""}}"><i class="fas fa-star mr-1"></i>お気に入り数が多い順</a></li>
        <li class="nav-item"><a href="{{ url("commentsRanking/all") }}" class="nav-link {{ Request::is("commentsRanking/*") ? "active" : ""}}"><i class="far fa-comments mr-1"></i>コメント数が多い順</a></li>
    </ul>  

   <select class="mb-2" name="select" onChange="location.href=value;">
     　<option value="#">年代を選択</option>
       <option value="{{ url("/commentsRanking/all") }}">全ての年代</option>
       <option value="{{ url("/commentsRanking/1970") }}">1970年代</option>
       <option value="{{ url("/commentsRanking/1980") }}">1980年代</option>
       <option value="{{ url("/commentsRanking/1990") }}">1990年代</option>
       <option value="{{ url("/commentsRanking/2000") }}">2000年代</option>
       <option value="{{ url("/commentsRanking/2010") }}">2010年代</option>
   </select>  
    　　    
      @include("songs.songs", ["songs" => $songs])
@endsection