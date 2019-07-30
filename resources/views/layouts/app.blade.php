<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>YourSongs</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link href="{{ asset('/css/style.css') }}" type="text/css" rel="stylesheet">
        <!--<script src="{{ asset('/js/main.js') }}"></script>-->
    </head>
    
    <body>
        @include("commons.navbar")
        
        <div class="container p-4" id="app">
            @include("commons.error_messages")
            
            <div id="top" class="d-none"></div>
            
            @yield("content")
        </div>
        
        <footer class="mt-5">
            <small>&copy; 2019 YourSongs</small>
        </footer>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <!--<script src="/js/main.js"></script>-->
        <script src="{{ asset('/js/main.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
        <script src="https://ssense.github.io/vue-carousel/js/vue-carousel.min.js"></script>
        <!--<script src="https://unpkg.com/vue-swal"></script>-->
        <script src="https://cdn.jsdelivr.net/npm/vue-scrollto"></script>
        <script>
            new Vue({
              el: '#app',
              data: {
                toBottom: '#bottom',
                toTop: '#top'
              }
            })
        </script>
            
    </body>
</html>