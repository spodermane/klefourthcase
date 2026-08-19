<div class="flex flex-col min-h-screen w-full bg-gray-100"> 
    
    <!-- Koyu Tema Navbar -->
    <nav class="w-full bg-slate-900 border-b border-slate-800" x-data="{ mobileMenuOpen: false }">
        <div class="w-full px-4 md:px-8 lg:px-16">
            <div class="relative flex h-16 items-center justify-between">
                
                <!-- Mobil Menü Butonu -->
                <div class="flex items-center md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="inline-flex items-center justify-center rounded-md p-2 text-slate-400 hover:bg-slate-700 hover:text-white focus:outline-none transition">
                        <span class="sr-only">Ana menüyü aç</span>
                        <svg x-show="!mobileMenuOpen" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg x-show="mobileMenuOpen" style="display: none;" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Masaüstü Menü Linkleri -->
                <div class="hidden md:flex flex-1 items-center justify-evenly">
                    <a href="/" class="text-white border-b-2 border-indigo-500 px-1 py-5 text-sm font-medium transition whitespace-nowrap">Anasayfa</a>
                    <a href="#" class="text-slate-300 hover:text-white border-b-2 border-transparent hover:border-slate-300 px-1 py-5 text-sm font-medium transition whitespace-nowrap">Kategoriler</a>
                    <a href="#" class="text-slate-300 hover:text-white border-b-2 border-transparent hover:border-slate-300 px-1 py-5 text-sm font-medium transition whitespace-nowrap">Yazarlar</a>
                    <a href="#" class="text-slate-300 hover:text-white border-b-2 border-transparent hover:border-slate-300 px-1 py-5 text-sm font-medium transition whitespace-nowrap">Hakkımızda</a>
                    <a href="#" class="text-slate-300 hover:text-white border-b-2 border-transparent hover:border-slate-300 px-1 py-5 text-sm font-medium transition whitespace-nowrap">İletişim</a>
                </div>

                <!-- Sağ Kısım: Profil İkonu -->
                <div class="flex items-center pl-4">
                    <div class="relative flex-shrink-0">
                        <button type="button" class="relative flex rounded-full bg-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 transition hover:scale-105">
                            <span class="sr-only">Kullanıcı menüsünü aç</span>
                            <svg class="h-8 w-8 text-slate-300 bg-slate-700 rounded-full p-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobil Menü -->
        <div class="md:hidden" x-show="mobileMenuOpen" style="display: none;">
            <div class="space-y-1 px-2 pb-3 pt-2 border-t border-slate-800">
                <a href="/" class="bg-slate-800 text-white block rounded-md px-3 py-2 text-base font-medium">Anasayfa</a>
                <a href="#" class="text-slate-300 hover:bg-slate-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Kategoriler</a>
                <a href="#" class="text-slate-300 hover:bg-slate-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Yazarlar</a>
            </div>
        </div>
    </nav>

    <!-- Ana İçerik Alanı -->
    <main class="flex-grow py-12 w-full">
        
        <!-- Sayfa Başlığı -->
        <div class="w-full px-4 text-center mb-10">
            <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-gray-900">Günlük Haberler</h1>
            <p class="pt-4 text-xl text-gray-500">Ekibimizden en son haberler, analizler ve trendler.</p>
        </div>

        <!-- Haber Kartları (Yanlardan sıkıştırıldı: max-w-5xl) -->
        <div class="max-w-5xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-12">
            
            @forelse($posts as $post)
                <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden flex flex-col hover:shadow-2xl transition-all duration-300 group">
                    <div class="overflow-hidden">
                        <!-- Aşağı doğru uzatıldı: h-80 veya h-96 -->
                        <img class="w-full h-80 md:h-96 object-cover transform group-hover:scale-105 transition-transform duration-500" 
                             src="{{ !empty($post['image']) ? $post['image'] : asset('images/varsayilan-haber.jpg') }}" 
                             alt="{{ $post['title'] ?? 'Haber Görseli' }}">
                    </div>
                    
                    <div class="p-8 flex flex-col flex-grow">
                        <!-- Yazı boyutları daralan karta göre uyarlandı -->
                        <h2 class="text-2xl font-bold mb-4 text-gray-900 line-clamp-2">
                            {{ $post['title'] ?? 'Örnek Başlık' }}
                        </h2>
                        <!-- İçerik yazısı dikey orantıyı desteklemesi için 4 satıra (line-clamp-4) çıkarıldı -->
                        <p class="text-gray-600 text-base line-clamp-4 mb-8">
                            {{ $post['content'] ?? 'Haberin kısa açıklaması burada yer alacak...' }}
                        </p>
                        <a href="#" class="mt-auto py-4 w-full bg-indigo-600 text-white text-center text-lg rounded-xl font-semibold hover:bg-indigo-700 transition duration-300">
                            Haberi Oku
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center mt-10 py-16 bg-white rounded-2xl shadow-sm border border-gray-200">
                    <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L18.5 6M9 11l3 3L22 4" />
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Hiç Haber Yok</h3>
                    <p class="mt-2 text-base text-gray-500">Şu an için gösterilecek bir haber bulunmuyor.</p>
                </div>
            @endforelse

        </div>
    </main>

    <!-- Footer -->
    <footer class="w-full bg-slate-900 border-t border-slate-800 text-slate-300 py-6 mt-12">
        <div class="w-full px-4 md:px-8 lg:px-16 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-sm">
                &copy; {{ date('Y') }} Günlük Haberler. Tüm hakları saklıdır.
            </div>
        </div>
    </footer>
</div>