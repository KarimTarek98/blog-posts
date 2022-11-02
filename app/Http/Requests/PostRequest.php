<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return (Auth::user()->username === 'Karim98') ? true : false;
    }


    public function rules()
    {
        if (request()->isMethod('POST'))
        {
            return [
                'title' => ['required', 'string', 'max:255'],
                'slug' => "required|unique:posts,slug",
                'excerpt' => ['required', 'string', 'max:255'],
                'body' => ['required', 'string'],
                'thumbnail' => ['required', 'image', 'mimes:png,jpg'],
                'category_id' => ['required', 'exists:categories,id']
            ];
        }
        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => "required|unique:posts,slug,{$this->post->id}",
            'excerpt' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg'],
            'category_id' => ['required', 'exists:categories,id']
        ];
    }
}
