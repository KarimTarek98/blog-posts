@props(['breadcrumb'])
<section class="px-6 py-8">
    <h1 class="text-lg font-bold mb-8 pb-2 border-b">
        {{ $breadcrumb }}
    </h1>


    {{ $slot }}
</section>
