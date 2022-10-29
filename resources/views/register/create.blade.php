<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">

        <form action="{{ route('register') }}" method="POST">
            @csrf
            {{-- Full Name --}}
            <div class="mb-6">
                <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Full Name</label>
                <input type="text" name="name" id="name" class="border border-gray-400 p-2 w-full" value="{{ old('name') }}" required>
                @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            {{-- Username --}}
            <div class="mb-6">
                <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="border border-gray-400 p-2 w-full" value="{{ old('username') }}" required>
                @error('username')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div class="mb-6">
                <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="border border-gray-400 p-2 w-full" value="{{ old('email') }}" required>
                @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-6">
                <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="border border-gray-400 p-2 w-full" required>
                @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password Confirmation --}}
            <div class="mb-6">
                <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="border border-gray-400 p-2 w-full" required>
                @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                Register
            </button>
        </form>

    </main>
</x-layout>
