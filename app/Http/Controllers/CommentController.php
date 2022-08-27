<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Request $request dependency injection laravel
    public function store(Post $post, Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'body' => ['required', 'max:255', 'string']
        ]);
        Comment::create(['body' => $request->input('body'), 'post_id' => $post->id, 'user_id' => $request->user()->id]);
        return back();
    }
    public function update()
    {

    }
    public function destroy()
    {
        $flash = 'Comment Deleted Successfully';
        if (!\request()->comment->delete()) {
            $flash = 'Something went Wrong';
        }
        return back()->with('success', $flash);
    }
}
