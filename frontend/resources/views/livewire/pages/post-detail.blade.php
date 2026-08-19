<div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <div class="mb-6">
        <a href="{{ route('home') }}" wire:navigate class="text-blue-600 font-medium hover:underline flex items-center">
            &larr; Ana Sayfaya Dön
        </a>
    </div>

    @if($post)
        <h1 class="text-4xl font-bold text-gray-900 mb-4">
            {{ $post['title'] ?? 'Başlıksız Yazı' }}
        </h1>

        <div class="prose prose-lg text-gray-700 leading-relaxed max-w-none bg-white p-8 rounded-lg shadow-sm border border-gray-100">
            {!! $post['content'] ?? 'İçerik bulunamadı.' !!}
        </div>
    @else
        <div class="text-center text-gray-500 py-10">
            Yazı yüklenirken bir sorun oluştu.
        </div>
    @endif
</div>