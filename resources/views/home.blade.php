@extends("layouts.app")

@section("content")
    {{ Auth::user()->name }}
@endsection


<!--<!DOCTYPE html>-->
<!--<html lang="ja">-->
<!--    <head>-->
<!--        <meta charset="utf-8">-->
<!--        <title>YourSongs</title>-->
<!--        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
<!--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">-->
<!--        <link href="css/style.css" type="text/css" rel="stylesheet">-->
<!--    </head>-->
    
<!--    <body>-->
<!--        @include("commons.navbar")-->
<!--            <header></header>-->
             
<!--            <div class="container p-4">-->
<!--                @include("commons.error_messages")-->
                
<!--                <h1 class="mb-4 text-center"><i class="far fa-lightbulb mr-1"></i>新しく投稿された曲</h1>-->
    
<!--                @if (count($songs) > 0)-->
<!--                     @include("songs.songs", ["songs" => $songs])-->
<!--                @endif-->
<!--            </div>-->
           
       
        
<!--        <footer class="bg-dark mt-5">-->
<!--            <small>&copy; 2019 YourSongs</small>-->
<!--        </footer>-->
     
        
<!--        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
<!--        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>-->
<!--        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>-->
<!--        <script src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>-->
<!--    </body>-->
<!--</html>-->