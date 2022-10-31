<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">

        <form action="{{ route('register') }}" method="POST">
            @csrf
            {{-- Full Name --}}
            <x-form.input name="name" />

            {{-- Username --}}
            <x-form.input name="username" />

            {{-- Email --}}
            <x-form.input name="email" type="email" />

            {{-- Password --}}
            <x-form.input name="password" type="password" />

            {{-- Password Confirmation --}}
            <x-form.input name="password_confirmation" type="password" />

            <x-primary-submit-btn>Register</x-primary-submit-btn>
        </form>

    </main>
</x-layout>
