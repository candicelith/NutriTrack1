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
