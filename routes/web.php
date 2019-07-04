<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get("/", "SongsController@index");

// Route::get("signup", "Auth\RegisterController@showRegistrationForm")->name("signup.get");
// Route::post("signup", "Auth\RegisterController@register")->name("signup.post");

// Route::get("login", "Auth\LoginController@showLoginForm")->name("login");
// Route::post("login", "Auth\LoginController@login")->name("login.post");
// Route::get("logout", "Auth\LoginController@logout")->name("logout.get");

// Route::get("password/reset/{token}", "Auth\ResetPasswordController@showResetForm")->name("password.reset");
// // Route::get("password/reset", "Auth\ResetPasswordController@showResetForm")->name("password.reset");
// Route::post("password/reset", "Auth\ResetPasswordController@reset");

// 未ログイン時
Route::group(["middleware" => "guest"], function(){
    // 未ログイン時のトップページ
    Route::get("/", "WelcomeController@welcome")->name("welcome");
    
    // ユーザ登録
    Route::get("signup", "Auth\RegisterController@showRegistrationForm")->name("signup.get");
    Route::post("signup", "Auth\RegisterController@register")->name("signup.post");
    
    // ログイン認証
    Route::get("login", "Auth\LoginController@showLoginForm")->name("login");
    Route::post("login", "Auth\LoginController@login")->name("login.post");
    
    Route::get("about", "WelcomeController@about")->name("about");
});

// ログインしている全ユーザー
Route::group(["middleware" => ["auth", "can:user-higher"]], function(){
    // ログイン時のトップページ
    Route::get("/home", "SongsController@index")->name("songs.index");
    
    // ログアウト
    Route::get("logout", "Auth\LoginController@logout")->name("logout.get");
    
    // Route::get('password/email','Auth\PasswordController@getEmail');
    // Route::post('password/email', 'Auth\PasswordController@postEmail');
    
    Route::resource("users", "UsersController", ["only" => ["index", "show", "edit", "update"]]);
    
    Route::group(["prefix" => "users/{id}"], function(){
        Route::post("follow", "UserFollowController@store")->name("user.follow");
        Route::delete("unfollow", "UserFollowController@destroy")->name("user.unfollow");
        Route::get("timeline", "UsersController@timeline")->name("users.timeline");
        Route::get("followings", "UsersController@followings")->name("users.followings");
        Route::get("followers", "UsersController@followers")->name("users.followers");
        Route::get("favorites", "UsersController@favorites")->name("users.favorites");
       
        Route::get("images", "UserImagesController@uploadForm")->name("users.userImages");
        Route::post("images", "UserImagesController@upload")->name("users.userImagesUpload");
    });
    
    Route::group(["prefix" => "songs/{id}"], function(){
        Route::post("favorite", "FavoritesController@store")->name("favorites.favorite");
        Route::delete("unfavorite", "FavoritesController@destroy")->name("favorites.unfavorite");
        
        Route::get("images", "SongImagesController@uploadForm")->name("songs.songImages");
        Route::post("images", "SongImagesController@upload")->name("songs.songImagesUpload");
        
    });
    
    Route::resource("songs", "SongsController", ["only" => ["create", "store", "show", "edit", "update", "destroy"]]);
   
    Route::get("favorites-ranking", "SongsController@favoritesRanking")->name("songs.favoritesRanking");
    
    Route::get("comments-ranking", "SongsController@commentsRanking")->name("songs.commentsRanking");
    
    Route::resource("comments", "CommentsController", ["only" =>["store", "destroy"]]);
    
    Route::get("search", "SearchController@index")->name("search.index");
});

// 管理者権限機能
Route::group(["middleware" => ["auth", "can:admin-higher"]], function(){
        Route::get("index-for-admin", "SongsController@indexForAdmin")->name("songs.indexForAdmin");
        Route::get("delete/{id}", "SongsController@delete")->name("songs.delete");
        Route::get("restore/{id}", "SongsController@restore")->name("songs.restore");
        Route::get("force-delete/{id}", "SongsController@forceDelete")->name("songs.forceDelete");
});

