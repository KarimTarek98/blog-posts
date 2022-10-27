<x-layout>
    <article>
        <h1>{{ $post->title }}</h1>
        <h3>
            By <a href="{{ url('author/' . $post->author->username) }}">{{ $post->author->name }}</a> in
            <a href="{{ url('categories/' . $post->category->slug) }}">
                {{ $post->category->name }}
            </a>
        </h3>
        <p>{!! $post->body !!}</p>
    </article>
    <a href="/">Go Back</a>
</x-layout>

