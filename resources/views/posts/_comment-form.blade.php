@auth
    <section class="col-span-8 col-start-5 mt-10 space-y-6">
        <form action="{{ url('posts/' . $post->slug . '/comments') }}" method="POST"
            class="border border-gray-200 p-6 rounded-xl">
            @csrf
            <div class="mt-6">
                <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" cols="30" rows="3"
                    placeholder="Leave your comment"></textarea>
                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end">
                <x-primary-submit-btn>Post</x-primary-submit-btn>
            </div>
        </form>
    </section>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or
        <a href="/login" class="hover:underline">log in</a> to leave a comment.
    </p>
@endauth
