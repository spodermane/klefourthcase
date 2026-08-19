<?php
namespace App\Livewire\Pages\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\http;
use Livewire\Attributes\Layout;

#[Layout('layouts.public')]

class Login extends Component{
    public $email = '';
    public $password = '';

    public function login(){

        //Backendteki login apiye istek atıyoz
        $response = Http::post('http://host.docker.internal:8081/api/login',[
            'email' =>$this->email,
            'password' =>$this->password
        ]);
        if ($response->successful()){
            session()->put('api_token',$response->json('token'));
            return $this->redirect('/yazi-ekle',navigate:true);
        }else {
            session()->flash('error','E-posta veya şifre hatalı.');
        }
    }
    public function render(){
        return view('livewire.pages.auth.login');
    }
}