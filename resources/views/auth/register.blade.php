<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#f3f3f3]">
        <div class="bg-white w-[460px] px-12 py-12 rounded-[24px]
                    shadow-[0_15px_35px_rgba(0,0,0,0.08)] text-center">

            <!-- Logo -->
            <div class="mb-8">
                <img src="/images/gift.png" class="w-24 mx-auto mb-6">

                <h2 class="text-2xl font-bold tracking-wide">
                    DAFTAR
                    <span class="text-pink-500">GLOWTOSKIN</span>
                </h2>

                <p class="text-sm text-gray-500 mt-4 leading-relaxed">
                    Buat akun untuk mulai berbelanja dan menikmati
                    berbagai produk kecantikan terbaik.
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-5 text-left">
                    <label class="text-sm font-medium text-gray-700">Nama</label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-xl
                               focus:ring-2 focus:ring-pink-400 focus:border-pink-400 outline-none">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Email -->
                <div class="mb-5 text-left">
                    <label class="text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-xl
                               focus:ring-2 focus:ring-pink-400 focus:border-pink-400 outline-none">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Password -->
                <div class="mb-5 text-left">
                    <label class="text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" required class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-xl
                               focus:ring-2 focus:ring-pink-400 focus:border-pink-400 outline-none">
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-6 text-left">
                    <label class="text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-xl
                               focus:ring-2 focus:ring-pink-400 focus:border-pink-400 outline-none">
                </div>

                <!-- Button -->
                <button type="submit" class="w-full bg-pink-500 text-white py-3 rounded-xl
                           font-semibold hover:bg-pink-600 transition duration-200">
                    Daftar
                </button>
            </form>

            <p class="mt-6 text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-pink-500 font-semibold hover:underline">
                    Masuk
                </a>
            </p>

            <p class="text-xs text-gray-400 mt-8 tracking-wider">
                © {{ date('Y') }} GLOWTOSKIN
            </p>

        </div>
    </div>
</x-guest-layout>