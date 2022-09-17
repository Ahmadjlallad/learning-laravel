<?php

namespace App\Http\Middleware;

use App\Models\Comment;
use App\Models\User;
use Closure;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckCommentBelongToAuthUser
{
    /**
     * Handle an incoming request.
     *
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $request->comment = Comment::checkCommentBelongToCurrentUser($request->comment);
        if (!$request->comment) {
            return back();
        }
        return $next($request);
    }
}
