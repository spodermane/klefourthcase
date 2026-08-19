<?php
namespace App\Livewire\Pages\Dashboard;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;

#[Layout('layouts.public')]
class CreatePost extends Component
{ 
    use WithFileUploads;
    public $title = '';
    public $content = '';
    public $image;

    public function save(){

    //Form Doğrulaması
    $this->validate([
        'title'=>'required|min:5',
        'content'=>'required'
    ]);
    $token = session('api_token');

    // apiye yazıyı gönderme
    $response = Http::withToken($token)->post('http://host.docker.internal:8081/api/posts',[
        'title'=>$this->title,
        'content'=>$this->content,
        'is_active'=>0,
        'category_id'=>1
    ]);
    if($response->successful()){
        session()->flash('message', 'Yazınız Gönderildi admin onayını bekleyiniz lütfen.');
        $this->reset(['title','content']);
    }
    }
    public function render(){
        return view('livewire.pages.dashboard.create-post');
    }
};