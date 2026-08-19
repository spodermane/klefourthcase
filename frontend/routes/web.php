<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', \App\Livewire\Pages\Home::class)->name('home');
Route::get('/yazi-ekle', \App\Livewire\Pages\Dashboard\CreatePost::class)->name('post.create');
Route::get('/yazi/{slug}', \App\Livewire\Pages\PostDetail::class)->name('post-detail');
Route::get('/giris',\App\Livewire\Pages\Auth\Login::class)->name('login');
Route::get('/kayit', \App\Livewire\Pages\Auth\Register::class)->name('register');
