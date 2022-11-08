<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Traits\StorablePostThumb;
use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{
    use StorablePostThumb;
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(20)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create', [
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
            'thumbnail' => 'storage/' . $this->storeThumbnail($request, 'thumbnail')
        ]);
        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    public function update(Post $post, PostRequest $request)
    {
        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'category_id' => $request->category_id,
            'thumbnail' => 'storage/' . $this->storeThumbnail($request, 'thumbnail')
        ]);
        return redirect('admin/posts')->with('success', 'Post Updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back()->with('success', 'Post Deleted!');
    }
}
