<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class PostController extends Controller
{
    final public function index(): Factory|View|Application
    {
        return view('posts.index', [
            'posts' => Post::latest('id')->filter(request(['category', 'search', 'author'] ))->with(['category', 'author'])->paginate(),
        ]);
    }

    final public function show(Post $post): Factory|View|Application
    {
        return view('posts.show', ['post' => $post->load('comments'), 'categories' => Category::all()]);
    }

    final protected function getPost(): array|Collection|\Illuminate\Support\Collection
    {
        $post = Post::latest();
        if (request('search')) {
            $post->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('body', 'like', '%' . request('search') . '%');
        }
        return $post->with(['category', 'author'])->get();
    }
}
