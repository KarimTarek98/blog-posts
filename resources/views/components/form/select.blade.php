@props(['name'])
<select name="{{ $name }}" id="{{ $name }}">
    {{ $slot }}
</select>

