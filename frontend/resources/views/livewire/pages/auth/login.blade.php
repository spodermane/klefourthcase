<div class="bg-gray-100 flex rounded-2xl shadow-lg max-w-3xl p-5">
    <div class="md-1/2 px-16 ">
        <h2 class="font-bold text-2xl text-[#002D74]">Giriş Yap</h2>
        <p class="text-small mt-4 text-[#002D74]">
            Eğer üye iseniz kolaylıkla giriş yapabilirsiniz.
        </p>
        
        <!-- DİKKAT: Form işlemi Livewire'a bağlandı -->
        <form wire:submit.prevent="login" class="flex flex-col gap-4">
            
            <!-- DİKKAT: wire:model eklendi ve type email yapıldı -->
            <div>
                <input class="p-2 mt-8 rounded-xl border w-full" type="email" wire:model="email" placeholder="Email">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="relative">
                <!-- DİKKAT: wire:model eklendi -->
                <input class="p-2 rounded-xl border w-full" type="password" wire:model="password" placeholder="Password">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye absolute top-1/2 right-3 -translate-y-1/2" viewBox="0 0 16 16">
                  <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                  <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                </svg>
                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>
            
            <!-- Butona type="submit" eklendi -->
            <button type="submit" class="bg-[#002D74] rounded-xl text-white py-2 hover:scale-105 duration-300">Giriş</button>
        </form>

        <p class="mt-3 text-xs border-gray-400 py-4">Şifrenizi mi Unuttunuz?</p>
        
        <div class="text-sm flex justify-between items-center">
            <p>Eğer hesabınız yoksa</p>
            <!-- DİKKAT: Kayıt Ol butonu az önce yaptığımız kayıt rotasına yönlendirildi -->
            <a href="{{ route('register') }}" class="py-2 px-5 bg-white border rounded-xl hover:scale-105 duration-300 text-center">Kayıt Ol</a>
        </div>
    </div>
    
    <div class="md:block hidden w-1/2">
        <img class="rounded-2xl w-full h-full object-cover" src="{{ asset('images/login.jpg') }}" alt="">
    </div>
</div>