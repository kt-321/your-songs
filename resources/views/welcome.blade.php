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
        <header class="text-center header-before-login">
            <h1 class="app-title">Your Songs</h1>
        </header>
        
    　　<div class="container container-before-login p-4">      
            <div class="text-center">
                <h2 class="welcome-message">Welcome to the YourSongs !!</h1>
                <a href="{{ route("login") }}" class="btn btn-lg btn-primary"><i class="fas fa-sign-out-alt mr-1"></i>ログイン</a>
                <a href="{{ route("signup.get") }}" class="btn btn-lg btn-success"><i class="fas fa-user-plus mr-1"></i>新規登録</a>
            </div>
        </div>
            
        <div class="container app-description p-4 mt-5">
            <div>
                <p>「おすすめの曲」をシェアしよう</p>
            </div>
            
            <div>
                <p>「YourSongs」はあなたの好きな曲を紹介することができるサービスです。</p>
                <p>さまざまな年代の名曲を知ることで、新たな音楽の発見につなげましょう。</p>
            </div>
        </div>
        
        <footer class="mt-5">
            <small>&copy; 2019 YourSongs</small>
        </footer>
         
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>