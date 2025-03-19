<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'content' => 'required',
            'username' => 'required',
            'email' => 'required|email',
        ]);

        $comment = new Comment($request->all());
        $comment->article()->associate($article);
        $comment->save();

        return redirect()->route('articles.show', $article)->with('success', 'Comment added successfully.');
    }
}
