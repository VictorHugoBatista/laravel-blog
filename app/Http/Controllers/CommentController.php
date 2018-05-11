<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'body' => 'required',
        ]);

        $post->addComment(new Comment(request(['subject', 'body'])));

        session()->flash('flash-type', 'success');
        session()->flash('flash-message', 'O comentário <strong>' . request('subject') . '</strong> foi publicado com sucesso!');

        return back();
    }
}
