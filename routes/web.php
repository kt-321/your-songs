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

Route::get('/', "SongsController@index");

Route::get("signup", "Auth\RegisterController@showRegistrationForm")->name("signup.get");
Route::post("signup", "Auth\RegisterController@register")->name("signup.post");

Route::get("login", "Auth\LoginController@showLoginForm")->name("login");
Route::post("login", "Auth\LoginController@login")->name("login.post");
Route::get("logout", "Auth\LoginController@logout")->name("logout.get");

// 全ユーザ
Route::group(["middleware" => ["auth", "can:user-higher"]], function(){
    Route::resource("users", "UsersController", ["only" => ["index", "show", "edit", "update"]]);
    
    Route::group(["prefix" => "users/{id}"], function(){
        Route::post("follow", "UserFollowController@store")->name("user.follow");
        Route::delete("unfollow", "UserFollowController@destroy")->name("user.unfollow");
        Route::get("followings", "UsersController@followings")->name("users.followings");
        Route::get("followers", "UsersController@followers")->name("users.followers");
        Route::get("favorites", "UsersController@favorites")->name("users.favorites");
       
        Route::get("userImages", "UserImagesController@uploadForm")->name("users.userImages");
        Route::post("userImages", "UserImagesController@upload")->name("users.userImagesUpload");
    });
    
    Route::group(["prefix" => "song/{id}"], function(){
        Route::post("favorite", "FavoritesController@store")->name("favorites.favorite");
        Route::delete("unfavorite", "FavoritesController@destroy")->name("favorites.unfavorite");
        
        Route::get("songImages", "SongImagesController@uploadForm")->name("songs.songImages");
        Route::post("songImages", "SongImagesController@upload")->name("songs.songImagesUpload");
        
    });
    
    Route::resource("songs", "SongsController", ["only" => ["create", "store", "show", "edit", "update", "destroy"]]);
   
    Route::get("favoritesRanking/all", "SongsController@favoritesRankingAll")->name("songs.favoritesRankingAll");
    Route::get("favoritesRanking/{id}", "SongsController@favoritesRanking")->name("songs.favoritesRanking");
    Route::get("commentsRanking/all", "SongsController@commentsRankingAll")->name("songs.commentsRankingAll");
    Route::get("commentsRanking/{id}", "SongsController@commentsRanking")->name("songs.commentsRanking");
    
    Route::resource("comments", "CommentsController", ["only" =>["store", "destroy"]]);
    
    Route::get("search", "SearchController@index")->name("search.index");
});

Route::group(["middleware" => ["auth", "can:admin-higher"]], function(){
        Route::get("index-for-admin", "SongsController@indexForAdmin")->name("songs.indexForAdmin");
        Route::get("delete/{id}", "SongsController@delete")->name("songs.delete");
        Route::get("restore/{id}", "SongsController@restore")->name("songs.restore");
        Route::get("force-delete/{id}", "SongsController@forceDelete")->name("songs.forceDelete");
});