<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>YourSongs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="../css/style.css" type="text/css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
    </head>
    
    <body>
        @include("commons.navbar")
        
        <header>
            <!--<button type="button" onclick=history.back()>戻る</button> -->
        </header>
        
        <div class="container p-4">
            @include("commons.error_messages")
            
            <h1 class="mb-4 text-center page-title"><i class="fas fa-user mr-1"></i>ユーザーを検索</h1>
            
            <!--検索フォーム-->
            <form class="px-3">
                <div class="form-group">
                    <div class="row m-0">
                        <div class="col-sm-3 my-auto">
                            <label class="form-label m-0"><i class="fas fa-user-circle mr-1"></i>名前</label>
                        </div>
                        
                        <div class="col-sm-5">
                            <input class="form-control" type="text" name="name" value="{{ $name }}" placeholder="名前を入力">
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row m-0">
                        <div class="col-sm-3 my-auto">
                            <label class="form-label m-0">年齢</label>
                        </div>
                        
                        <div class="col-sm-4">
                            <select name="age" class="form-control select select-primary mbl" data-toggle="select">
                                <option value="">全て</option>
                                <option value="10" @if($age=="10") selected @endif>10代</option>
                                <option value="20" @if($age=="20") selected @endif>20代</option>
                                <option value="30" @if($age=="30") selected @endif>30代</option>
                                <option value="40" @if($age=="40") selected @endif>40代</option>
                                <option value="50" @if($age=="50") selected @endif>50代</option>
                                <option value="60" @if($age=="60") selected @endif>60代</option>
                                <option value="70" @if($age=="70") selected @endif>70代</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="row m-0">
                        <div class="col-sm-3 my-auto">
                            <label class="form-label m-0">性別</label>
                        </div>
                        
                        <div class="col-sm-4">
                            <select name="gender" class="form-control select select-primary mbl" data-toggle="select">
                                <option value="">全て</option>
                                <option value="1" @if($gender=="1") selected @endif>男性</option>
                                <option value="2" @if($gender=="2") selected @endif>女性</option>
                            </select>
                        </div>
                    </div>
                </div>
             
              <div class="col-xs-offset-2 col-xs-10 text-center">
                  <button type="submit" class="btn btn-default btn-success">以上の条件で検索</button>
              </div>
            </form>
                
            <!--検索結果の表示-->
            @if($name != "" || $age != "" || $gender != "")
                @if(count($users) == 0)
                <p class="text-center mt-3 mb-0">該当する曲は見つかりませんでした。</p>
                @endif   
            @endif
            
            <!--ページネーション-->
            <div class="paginate text-center mt-3 mb-5">
                {{ $users->appends(["name"=>$name, "age"=>$age, "gender"=>$gender])->render("pagination::bootstrap-4") }}
            </div>
            
            <!--該当するユーザーの一覧-->
            @if(count($users))
                <ul class="list-unstyled">
                @foreach ($users as $user)
                    <li class="user-card mx-0 mb-3 p-2 row">
                        <div class="col-sm-4 media">
                            <div class="media-left my-auto">
                                <figure class="text-center m-0">
                                    @if($user->image_url)
                                        <img src="{{ $user->image_url }}" alt="アイコン" class="circle2"> 
                                    @elseif($user->gender == 1)
                                        <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/man.jpeg" alt="アイコン" class="circle2">
                                    @elseif($user->gender == 2)
                                        <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/woman.jpeg" alt="アイコン" class="circle2">
                                    @else    
                                        <img src="https://original-yoursongs.s3-ap-northeast-1.amazonaws.com/qustion-mark.jpeg" alt="アイコン" class="circle2">
                                    @endif
                                    <figcaption class="text-center m-0">
                                        <a href="{{ route("users.show", ["id" => $user->id]) }}">{{ $user->name }}</a>
                                    </figcaption>
                                </figure>
                            </div>
                            
                            <div class="media-body ml-3 my-auto">
                                @if($user->age)
                                <p class="mb-0">{!! nl2br(e($user->age)) !!}代</p>
                                @else
                                <p class="mb-0"></p>
                                @endif
                                
                                @if($user->gender == 1)
                                <p class="mb-0">男性 </p>
                                @elseif($user->gender == 2)
                                <p class="mb-0">女性 </p>
                                @endif
                                
                                @if($user->favorite_music_age)
                                <p class="mb-0">{!! nl2br(e($user->favorite_music_age)) !!}年代の音楽</p>
                                @endif
                               
                                @if($user->favorite_artist)
                                <p class="mb-0">好きなミュージシャン：{!! nl2br(e($user->favorite_artist)) !!}</p>
                                @endif
                            </div>
                        </div>
                        
                        <!--フォロー・アンフォローボタンとプロフィールを見るボタン-->
                        <div class="col-sm-3 my-auto">
                            
                            <!--自己紹介-->
                            <div class ="balloon1-left" style="word-wrap: break-word;">
                                @if($user->comment)
                                <p class="mb-0">{{ $user->comment }}</p>
                                @else
                                <p>．．．</p>
                                @endif
                            </div>
                            
                            
                            <div>
                                <div style="display:inline-block">
                                    @include("user_follow.follow_button", ["user" => $user])
                                </div>
                                <a class="btn btn-success btn-sm" href="{{ route("users.show", ["id" => $user->id]) }}">プロフィール</a>
                            </div>
                        </div>
                    </li>
                @endforeach
                </ul>
            @endif
            
            <div class="paginate text-center mt-3">
                {{ $users->appends(["name"=>$name, "age"=>$age, "gender"=>$gender])->render("pagination::bootstrap-4") }}
            </div>
            
             <!--おすすめのユーザー-->
                <!--@if(count($recommended_users) > 0)-->
                <div id="recommended-users" class="mb-5">
                    <span class="badge badge-pill badge-success mb-2">あなたと音楽の趣味が合いそうなユーザー</span>
                    <carousel :per-page-custom="[[0, 1], [768, 2], [992, 3]]" :autoplay="true" :loop="true" :speed=3000 :navigation-enabled="true" :pagination-enabled="false">
                        @foreach($recommended_users as $recommended_user)
                        <slide class="border py-1">
                            <a href="{{ url("songs/{$recommended_user->id}") }}" class="text-dark">
                            <figure class="text-center pt-2 m-0">
                                @if($recommended_user->image_url)
                                    <img src="{{ $recommended_user->image_url }}" alt="アイコン" class="circle4"> 
                                @elseif($recommended_user->gender == 1)
                                    <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/man.jpeg" alt="アイコン" class="circle4">
                                @elseif($recommended_user->gender == 2)
                                    <img src="https://s3-ap-northeast-1.amazonaws.com/original-yoursongs/woman.jpeg" alt="アイコン" class="circle4">
                                @else    
                                    <img src="https://original-yoursongs.s3-ap-northeast-1.amazonaws.com/qustion-mark.jpeg" alt="アイコン" class="circle4">
                                @endif
                                <figcaption class="text-center m-0">
                                    <a href="{{ route("users.show", ["id" => $recommended_user->id]) }}">{{ $recommended_user->name }}</a>
                                </figcaption>
                            </figure>
                                
                                <ul class="list-unstyled px-3">
                                    @if($recommended_user->age)
                                    <p class="mb-0">{!! nl2br(e($recommended_user->age)) !!}代</p>
                                    @else
                                    <p class="mb-0"></p>
                                    @endif
                                    
                                    @if($recommended_user->gender == 1)
                                    <p class="mb-0">男性 </p>
                                    @elseif($recommended_user->gender == 2)
                                    <p class="mb-0">女性 </p>
                                    @endif
                                    
                                    @if($recommended_user->favorite_artist)
                                    <li class="mb-1" style="word-wrap: break-word;"><i class="fas fa-guitar mr-1"></i>好きなミュージシャン：{!! nl2br(e($recommended_user->favorite_artist)) !!}</li>
                                    @endif
                                    
                                    @if($recommended_user->favorite_music_age)
                                    <li class="mb-1" style="word-wrap: break-word;"><i class="fas fa-history mr-1"></i>好きな年代：{!! nl2br(e($recommended_user->favorite_music_age)) !!}年代</li>
                                    @endif
                                </ul>
                            </a>
                        </slide>
                        @endforeach
                    </carousel>
                </div>
                <!--@endif-->
        </div>
                
                <footer class="mt-5">
                    <small>&copy; 2019 YourSongs</small>
                </footer>
                
                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
                <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
                <script src="https://ssense.github.io/vue-carousel/js/vue-carousel.min.js"></script>
                <script src="../js/main.js"></script>
            </body>
        </html>