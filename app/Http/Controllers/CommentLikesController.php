<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentLikesController extends Controller
{
    public function store(Comment $comment)
    {
        $comment->like(Auth::user());

        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->dislike(Auth::user());

        return back();
    }
}
