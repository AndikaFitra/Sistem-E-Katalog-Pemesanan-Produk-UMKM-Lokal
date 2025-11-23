<x-guest-layout>
    
    <!-- Page Title -->
    <div class="mb-6 text-center">
        <h2 class="text-2xl font-bold text-gray-900">Buat Akun Baru</h2>
        <p class="text-sm text-gray-600 mt-1">Daftar sebagai Admin untuk mengelola sistem</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" value="Nama Lengkap" class="font-semibold text-gray-700" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <x-text-input 
                    id="name" 
                    class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200" 
                    type="text" 
                    name="name" 
                    :value="old('name')" 
                    placeholder="John Doe"
                    required 
                    autofocus 
                    autocomplete="name" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Email Address" class="font-semibold text-gray-700" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                    </svg>
                </div>
                <x-text-input 
                    id="email" 
                    class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    placeholder="your@email.com"
                    required 
                    autocomplete="username" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <x-input-label for="password" value="Password" class="font-semibold text-gray-700" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                    </svg>
                </div>
                <x-text-input 
                    id="password" 
                    class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                    type="password"
                    name="password"
                    placeholder="Minimal 8 karakter"
                    required 
                    autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <x-input-label for="password_confirmation" value="Konfirmasi Password" class="font-semibold text-gray-700" />
            <div class="relative mt-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>
                <x-text-input 
                    id="password_confirmation" 
                    class="block w-full pl-10 pr-4 py-3 border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200"
                    type="password"
                    name="password_confirmation" 
                    placeholder="Ulangi password"
                    required 
                    autocomplete="new-password" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Info Box -->
        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-lg">
            <div class="flex items-start">
                <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <p class="text-sm font-semibold text-blue-800">Catatan Penting</p>
                    <p class="text-xs text-blue-700 mt-1">
                        Akun admin yang baru dibuat akan menunggu persetujuan dari Superadmin sebelum dapat digunakan.
                    </p>
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full flex justify-center items-center px-4 py-3 text-white font-semibold rounded-lg shadow-md transition duration-200 transform hover:-translate-y-0.5 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
                Daftar Sekarang
            </button>
        </div>

        <!-- Links -->
        <div class="flex items-center justify-center pt-4 border-t border-gray-200">
            <p class="text-sm text-gray-600">
                Sudah punya akun?
                <a class="text-purple-600 hover:text-purple-800 font-semibold transition duration-200 ml-1" href="{{ route('login') }}">
                    Masuk di sini
                </a>
            </p>
        </div>
    </form>

    <!-- Alternative -->
    <div class="mt-6">
        <div class="relative">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white text-gray-500">Atau kembali ke</span>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ url('/') }}" class="w-full flex justify-center items-center px-4 py-3 border-2 border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                Halaman Utama
            </a>
        </div>
    </div>

</x-guest-layout>