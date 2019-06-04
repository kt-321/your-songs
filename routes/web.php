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

Route::group(["middleware" => ["auth"]], function(){
    Route::resource("users", "UsersController", ["only" => ["index", "show", "edit", "update"]]);
    
    Route::group(["prefix" => "users/{id}"], function(){
        Route::post("follow", "UserFollowController@store")->name("user.follow");
        Route::delete("unfollow", "UserFollowController@destroy")->name("user.unfollow");
        Route::get("followings", "UsersController@followings")->name("users.followings");
        Route::get("followers", "UsersController@followers")->name("users.followers");
        Route::get("favorites", "UsersController@favorites")->name("users.favorites");
    });
    
    Route::group(["prefix" => "song/{id}"], function(){
        Route::post("favorite", "FavoritesController@store")->name("favorites.favorite");
        Route::delete("unfavorite", "FavoritesController@destroy")->name("favorites.unfavorite");
        Route::post("songImages", "SongImagesController@upload")->name("songImages.upload");
        
    });
    
    
    Route::resource("songs", "SongsController", ["only" => ["create", "store", "show", "edit", "update", "destroy"]]);
   
    Route::get("/favoritesRanking/all", "SongsController@favoritesRankingAll")->name("songs.favoritesRankingAll");
    Route::get("/favoritesRanking/{id}", "SongsController@favoritesRanking")->name("songs.favoritesRanking");
    Route::get("/commentsRanking/all", "SongsController@commentsRankingAll")->name("songs.commentsRankingAll");
    Route::get("/commentsRanking/{id}", "SongsController@commentsRanking")->name("songs.commentsRanking");
    
    
    Route::post("userImages", "UserImagesController@upload")->name("userImages.upload");
    
    Route::resource("comments", "CommentsController", ["only" =>["store", "destroy"]]);
    
});