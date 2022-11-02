@props(['trigger'])
<div x-data="{ show: false }" @click.away="show = false" class="relative">
    <div @click="show = ! show">
        {{ $trigger }}
    </div>

    <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 z-50 rouned-xl w-full x-50 overflow-auto max-h-50" style="display: none">

        {{ $slot }}
    </div>
</div>
