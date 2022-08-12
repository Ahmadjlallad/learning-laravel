<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Events\QueryExecuted;
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


Route::get('/', static function () {
    \Illuminate\Support\Facades\DB::listen(
        static function(QueryExecuted $query) {
        logger($query->sql, $query->bindings);
        //we can find the files in storage -> log -> laravel.log
    });
    return view('posts', ['posts' => Post::all()]);
});

Route::get('/json', static function () {
    return ['foo' => 'bar'];
});

// to cache something use cache global name space with remember
// to add constraint to wild card add ->where

// in this cass laravel use route model binding
//Route::get('/post/{post}', static function (Post $post) {
//    // Find a Post by its slug and pass it to view
//    // it presumable a model so create a model in the app model dir
//    return view('post',  ['post' => $post]);
//})
//    ->whereNumber('post'); // advance we can use regular exp
//    ->where('post', '[A-z_\\-]+'); // advance we can use regular exp
//->whereAlpha('post'); // Aliphatic A-z
// using slug
Route::get('/post/{post:slug}', static function (Post $post) {
    // Find a Post by its slug and pass it to view
    // it presumable a model so create a model in the app model dir
    return view('post', ['post' => $post]);
});
Route::get('/category/{category:slug}', static function(Category $category) {
    return view('posts', ['posts' => $category->post]);
});
