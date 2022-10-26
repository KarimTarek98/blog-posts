<x-layout>

        @foreach ($posts as $post)
        <article class="{{ $loop->even ? 'mb-4' : '' }}">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}</a>
            </h1>
            <p>{!! $post->body !!}</p>
        </article>
        @endforeach
    
</x-layout>

