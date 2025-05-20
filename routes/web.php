<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('content.home');
})->name('home');

Route::get('/data-anak', function () {
    return view('content.data-anak');
})->name('data-anak');

Route::get('/data-anak-create', function () {
    return view('content.data-anak-create');
})->name('data-anak-create');

Route::get('/data-anak-update', function () {
    return view('content.data-anak-update');
})->name('data-anak-update');

Route::get('/data-gizi', function () {
    return view('content.data-gizi');
})->name('data-gizi');

Route::get('/data-gizi-create', function () {
    return view('content.data-gizi-create');
})->name('data-gizi-create');

Route::get('/data-gizi-update', function () {
    return view('content.data-gizi-update');
})->name('data-gizi-update');

Route::get('/edit-profil', function () {
    return view('content.edit-profil');
})->name('edit-profil');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/signup', function () {
    return view('auth.signup');
})->name('signup');
