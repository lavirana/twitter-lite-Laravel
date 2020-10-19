<?php

//DB::listen(function ($query) { var_dump($query->sql, $query->bindings); });

use Illuminate\Support\Facades\Route;

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


Route::group(['middleware'=>"web"],function(){
Route::get('/admin/home','admin\HomeController@index');
Route::get('/admin/happenings','admin\HomeController@happening');
Route::POST('/admin/get_searchresult','admin\HomeController@getsearch');
Route::POST('/admin/users','admin\HomeController@getSearchusers');
Route::get('/admin/users','admin\HomeController@getusers');
Route::POST('/admin/deleteUser','admin\HomeController@deleteuser');
Route::view('/admin/login','admin\login');
Route::post('/admin/login','admin\UserController@login');
});


Route::middleware('auth')->group(function(){
    Route::get('/tweets','TweetsController@index')->name('home'); 
    Route::post('/tweets','TweetsController@store'); 
    
    Route::post('/tweets/{tweet}/like','TweetLikesController@store');
    Route::delete('/tweets/{tweet}/like','TweetLikesController@destroy');
    
    Route::post('/profiles/{user:username}/follow','FollowsController@store'); 
    Route::get('/profiles/{user:username}/edit','ProfilesController@edit'); 
    Route::patch('/profiles/{user:username}','ProfilesController@update'); 
    
   Route::get('/explore','ExploreController@index')->name('explore');
   Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
    
    
    Route::get('/search','ContactController@search');
    Route::get('/messages','MessagesController@index')->name('messages');
    Route::get('/read_message/{user_id}/{from_id}','MessagesController@getMessage')->name('read_message');
    Route::get('/get_message/{user_id}/{from_id}','MessagesController@fetchMessage')->name('get_message');
    Route::post('/save_message','MessagesController@saveMessage');
});

Route::get('/profiles/{user:username}','ProfilesController@show')->name('profile');


Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
