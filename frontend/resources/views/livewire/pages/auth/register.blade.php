<div class="min-h-screen w-full bg-gray-50 flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-white p-8 sm:p-10 rounded-2xl shadow-xl">
        
        <div class="text-center mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900">Hesap Oluştur</h1>
        </div>

        <!-- API'den dönen Hata veya Başarı Mesajları -->
        @if (session()->has('error'))
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-md mb-5 text-sm shadow-sm">
                {{ session('error') }}
            </div>
        @endif
        @if (session()->has('success'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-md mb-5 text-sm shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="register" class="space-y-6">
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Ad Soyad</label>
                <input type="text" wire:model="name" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-gray-50 focus:bg-white" placeholder="İsim Soyisim">
                @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Email Adresi</label>
                <input type="email" wire:model="email" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-gray-50 focus:bg-white" placeholder="ornek@email.com">
                @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Şifre</label>
                <input type="password" wire:model="password" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-gray-50 focus:bg-white" placeholder="••••••••">
                @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Şifre Tekrar</label>
                <input type="password" wire:model="password_confirmation" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all bg-gray-50 focus:bg-white" placeholder="••••••••">
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 px-4 rounded-xl hover:bg-indigo-700 hover:shadow-lg focus:outline-none focus:ring-4 focus:ring-indigo-300 transition-all transform hover:-translate-y-1">
                    Kayıt Ol
                </button>
            </div>

            <div class="text-center mt-6">
                <p class="text-sm text-gray-600">
                    Zaten bir hesabınız var mı? 
                    <a href="{{ route('login') }}" class="text-indigo-600 font-bold hover:text-indigo-800 transition-colors" wire:navigate>Giriş Yap</a>
                </p>
            </div>
            
        </form>
    </div>
</div>