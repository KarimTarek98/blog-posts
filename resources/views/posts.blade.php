<x-layout>

    {{-- @foreach ($posts as $post)
        <article class="{{ $loop->even ? 'mb-4' : '' }}">
            <h1>
                <a href="/posts/{{ $post->slug }}">
                    {{ $post->title }}</a>
            </h1>
            <h3>
                By <a href="{{ url('authors/' . $post->author->username) }}">{{ $post->author->name }}</a> in
                <a href="{{ url('categories/' . $post->category->slug) }}">
                    {{ $post->category->name }}
                </a>
            </h3>
            <p>{!! $post->excerpt !!}</p>
        </article>
        @endforeach --}}

    @include('_post-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
        <x-post-grid :posts="$posts" />

        @else
        <p>Sorry, there is no posts published yet.</p>
        @endif

       {{-- <div class="lg:grid lg:grid-cols-3">


            <x-post-card />
            <x-post-card />
            <x-post-card />
        </div> --}}
    </main>

</x-layout>
