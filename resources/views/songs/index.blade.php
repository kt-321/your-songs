<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>YourSongs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="css/style.css" type="text/css" rel="stylesheet">
    </head>
    
    <body>
        @include("commons.navbar")
        <header>
            <!--<button type="button" onclick=history.back()>戻る</button> -->
        </header>
         
        <div class="container p-4">
            @include("commons.error_messages")
            
            <h1 class="page-title mb-4 text-center"><i class="far fa-lightbulb mr-1"></i>新しく投稿された曲</h1>
            
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
            
            <!--@if (count($songs) > 0)-->
                 @include("songs.songs", ["songs" => $songs])
            <!--@endif-->
        </div>
           
        <footer class="bg-dark mt-5">
            <small>&copy; 2019 YourSongs</small>
        </footer>
     
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>