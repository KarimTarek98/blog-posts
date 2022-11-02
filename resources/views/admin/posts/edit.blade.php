<x-layout>
    <x-default-form-post breadcrumb="Edit Post">
        <form method="POST" action="{{ url('admin/posts/' . $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" value="{{ $post->title }}" />

            <x-form.input name="slug" value="{{ $post->slug }}" />

            <x-form.input name="excerpt" value="{{ $post->excerpt }}" />

            <x-form.textarea name="body">{!! $post->body !!}</x-form.textarea>

            <x-form.input-wrapper>
                <x-form.label name="category" />

                <x-form.select name="category_id">
                    <option value="{{ $post->category->id }}" selected
                    >{{ ucwords($post->category->name) }}
                    </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </x-form.select>

                <x-form.error name="category" />
            </x-form.input-wrapper>

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                </div>

                <img src="{{ asset($post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>

            <x-primary-submit-btn>Update Post</x-primary-submit-btn>
        </form>
    </x-default-form-post>
</x-layout>
