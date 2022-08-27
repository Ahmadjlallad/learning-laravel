<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Category;
use App\Models\User;
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


//Route::get('/', static function () {
////    \Illuminate\Support\Facades\DB::listen(
////        static function(QueryExecuted $query) {
////        logger($query->sql, $query->bindings);
////        //we can find the files in storage -> log -> laravel.log
////    });
//    // we can ues clock work instead we need to install it in the project and use the chrome extinction or any available
//
//    // to solve the n+1 problem we can ues the with function
//    // n+1 problem will acre when we get the post and then try to lazy load every query so laravel will try to select every category by single id
//    // but with will use between to solve this issue
//
//})->name('home');

Route::get('/', [PostController::class, 'index'])->name('home');

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
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/category/{category:slug}', static function (Category $category) {
    return view('posts', ['posts' => $category->post->load(['category', 'author']), 'categories' => Category::all(), 'currentCategory' => $category]);
})->name('category');
Route::get('/authors/{author:username}', static function (User $author) {
    return view('posts.index', ['posts' => $author->post->load(['category', 'author']), 'categories' => Category::all()]);
});
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/sessions', [SessionsController::class, 'login'])->middleware('guest');
Route::post('/{post}/comments', [CommentController::class, 'store']);
Route::resource('/comments', CommentController::class, ['only' => ['destroy', 'update']])->middleware('hasComment');