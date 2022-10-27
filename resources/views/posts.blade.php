<x-layout>

        @foreach ($posts as $post)
        <article class="{{ $loop->even ? 'mb-4' : '' }}">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}</a>
            </h1>
            <h3>
                <a href="{{ url('categories/' . $post->category->slug) }}">
                    {{ $post->category->name }}
                </a>
            </h3>
            <p>{!! $post->excerpt !!}</p>
        </article>
        @endforeach

</x-layout>

