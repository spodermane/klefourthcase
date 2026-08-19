<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]
class Home extends Component
{
    // Arama kutusu
    public $search = '';

    public function render()
    {
        // apiye istek atma
        $response = Http::get('http://host.docker.internal:8081/api/posts', [
            'search' => $this->search
        ]);

        $posts = $response->json();

        return view('livewire.pages.home', [
            'posts' => $posts
        ]);
    }
}