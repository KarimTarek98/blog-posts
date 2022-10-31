<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()
            ->search(request(['search', 'category', 'author']))
            ->simplePaginate(4)->withQueryString(),

        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        return view('posts.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(PostRequest $request)
    {
        Post::create([
            'category_id' => $request->category_id,
            'user_id' => Auth::id(),
            'slug' => str_replace(' ', '-', strtolower($request->slug)),
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
        ]);
        return redirect('/');
    }
}
