<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCommentRequest;
use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post, PostCommentRequest $request)
    {
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $request->body
        ]);
        return back();
    }
}
