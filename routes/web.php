<?php

use App\Livewire\PostForm;
use App\Livewire\Postlist;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('posts', Postlist::class)->name('posts');
Route::get('posts/create', PostForm::class)->name('posts.create');
Route::get('posts/{post}/view', PostForm::class)->name('posts.view');
Route::get('posts/{post}/edit', PostForm::class)->name('posts.edit');
