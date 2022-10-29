<x-dropdown>

    <x-slot name="trigger">
        <button
class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
{{ isset($activeCategory) ? Str::ucfirst($activeCategory->name) : 'Categories' }}

<x-svg-arrow class="absolute pointer-events-none" style="right: 12px;" />
</button>
    </x-slot>

        <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>

        @foreach ($categories as $category)

        <x-dropdown-item href="/?category={{ $category->slug }}"
            :active="isset($activeCategory) && $activeCategory->is($category) ? 'bg-blue-500 text-white' : ''">
            {{ Str::ucfirst($category->name) }}
        </x-dropdown-item>

        @endforeach

    </x-dropdown>
