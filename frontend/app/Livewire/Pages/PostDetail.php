<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class PostDetail extends Component
{
    public $post;
    //Sayfada calısacak fonksiyonun parametresini alıyo:
    public function mount($slug)
    {
        $response = Http::get('http://host.docker.internal:8080/api/posts/' . $slug);
        
        if ($response->successful()) {
            $this->post = $response->json('data') ?? $response->json();
        } else {
            abort(404, 'Yazı bulunamadı.');
        }
    }

    public function render()
    {
        return view('livewire.pages.post-detail');
    }
}