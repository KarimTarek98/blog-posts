<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\File;

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

Route::get('/', function () {

    return view('posts', [
        'posts' => Post::latest()->with(['category', 'author'])->get(),
        'categories' => Category::all()
    ]);

})->name('home');

Route::get('/posts/{post:slug}', function (Post $post) {
    //$post = Post::findOrFail($id);


    return view('post', [
        'post' => $post
    ]);

});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts->load(['category', 'author']),
        'activeCategory' => $category,
        'categories' => Category::all()
    ]);
});

Route::get('/authors/{author}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts->load(['category', 'author']),
        'categories' => Category::all()
    ]);
});
