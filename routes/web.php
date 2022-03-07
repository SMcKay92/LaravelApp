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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get("/home/posts/create", "PostController@create");
Route::post("/home/posts", "PostController@store");
Route::get("/home/themes/create", "ThemeController@create");
Route::post("/home/themes", "ThemeController@store");

//user & admin routes
Route::get("/home/manage", "UserController@index");
Route::get("/home/manage/{user}", "UserController@show");
Route::get("/home/create", "UserController@create");
Route::post("/home/manage", "UserController@store");
Route::get("/home/manage/{user}/edit", "UserController@edit");
Route::post("/home/manage/{user}", "UserController@update");
Route::post("/home/manage/{user}/delete", "UserController@delete");

//post routes
Route::get("/home", "PostController@index");
Route::get("/home/posts", "PostController@index");
Route::get("/home/posts/{post}", "PostController@show");
Route::get("/home/posts/{post}/edit", "PostController@edit");
Route::post("/home/posts/{post}", "PostController@update");
Route::post("/home/posts/{post}/delete", "PostController@delete");

//theme routes

Route::get("/home/themes", "ThemeController@index");
Route::get("/home/themes/{theme}", "ThemeController@show");
Route::get("/home/themes/{theme}/edit", "ThemeController@edit");
Route::post("/home/themes/{theme}", "ThemeController@update");
Route::post("/home/themes/{theme}/delete", "ThemeController@delete");

//cookie routes
Route::get("/home/themes/cookie", "CookieController@getCookie");
Route::post("/home/themes/cookie", "CookieController@setCookie");


