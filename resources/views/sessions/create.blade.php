<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In!</h1>

            <form method="POST" action="{{ route('login') }}" class="mt-10">
                @csrf

                <x-form.input name="email" type="email" />

                <x-form.input name="password" type="password" />

                <x-primary-submit-btn>Login</x-primary-submit-btn>
            </form>
        </main>
    </section>
</x-layout>
