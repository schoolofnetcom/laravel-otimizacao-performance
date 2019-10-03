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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('posts', 'PostController');
Route::resource('users', 'UserController');

Route::get('report.pdf', function(){
    $posts = \App\Post::cursor();
    dd($posts);
    $pdf = \PDF::loadView('post.report', compact('posts'));
    dump(memory_get_usage() / 1024 / 1024);
    return $pdf->download('posts.pdf');
});
//laravel-snappy wkhtmltopdf
