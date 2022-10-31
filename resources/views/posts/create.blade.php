<x-layout>
    <section class="px-6 py-8">
        <form method="POST" action="{{ url('admin/posts/store') }}" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" />

            <x-form.input name="slug" />

            <x-form.input name="excerpt" />

            <x-form.textarea name="body" />

            <x-form.input-wrapper>
                <x-form.label name="category" />

                <x-form.select name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </x-form.select>

                <x-form.error name="category" />
            </x-form.input-wrapper>

            <x-form.input name="thumbnail" type="file" />

            <x-primary-submit-btn>Publish</x-primary-submit-btn>
        </form>
    </section>
</x-layout>
