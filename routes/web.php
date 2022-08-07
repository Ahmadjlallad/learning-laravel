<?php

use App\Models\Post;
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
    $posts = Post::all();
    return view('posts', ['posts' => $posts]);
});

Route::get('/json', static function () {
    return ['foo' => 'bar'];
});

// to cache something use cache global name space with remember
// to add constraint to wild card add ->where
Route::get('/post/{post}', static function ($id) {
    // Find a Post by its slug and pass it to view
    // it presumable a model so create a model in the app model dir
    return view('post',  ['post' => Post::find($id)]);
})
    ->whereNumber('post'); // advance we can use regular exp
//    ->where('post', '[A-z_\\-]+'); // advance we can use regular exp
//->whereAlpha('post'); // Aliphatic A-z
