<?php

namespace App\Livewire\Pages\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')] // Login'de kullandığın layout ile aynı
class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    public function register()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|min:8|same:password_confirmation',
        ]);

        $response = Http::post('http://host.docker.internal:8081/api/register', [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
        ]);
        if ($response->successful()) {
            session()->flash('success', 'Kayıt başarılı! Lütfen giriş yapın.');
            return $this->redirect('/giris', navigate: true);
        } else {
            session()->flash('error', 'Kayıt olurken bir hata oluştu. E-posta adresi kullanılıyor olabilir.');
        }
    }

    public function render()
    {
        return view('livewire.pages.auth.register');
    }
}