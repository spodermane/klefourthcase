<div> <!-- LİVEWIRE'IN İSTEDİĞİ TEK ANA KAPSAYICI DİV -->
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow mt-10">
        <h1 class="text-2xl font-bold mb-6">Yeni Yazı Gönder</h1>

        <!--Başarı -->
        @if (session()->has('message'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <!--Hata-->
        @if (session()->has('error'))
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form wire:submit="save" class="space-y-4">
            <div>
                <label class="block font-medium">Başlık</label>
                <input type="text" wire:model="title" class="w-full border rounded p-2 mt-1">
                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block font-medium">İçerik</label>
                <textarea wire:model="content" rows="5" class="w-full border rounded p-2 mt-1"></textarea>
                @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block font-medium">Kapak Görseli (Opsiyonel)</label>
                <input type="file" wire:model="image" class="w-full border rounded p-2 mt-1">
                @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                <div wire:loading wire:target="image" class="text-sm text-blue-500 mt-2">
                    Görsel yükleniyor...
                </div>
                <!--Önizleme -->
                @if ($image)
                    <div class="mt-4">
                        <p class="text-sm text-gray-500 mb-2">Önizleme:</p>
                        <img src="{{ $image->temporaryUrl() }}" class="w-32 h-32 object-cover rounded shadow">
                    </div>
                @endif
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                 Gönder
            </button>
        </form>
    </div>
</div>