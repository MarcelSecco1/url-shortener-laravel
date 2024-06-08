<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;


Route::get('/', [UrlController::class, 'index'])->name('index');

Route::post('/shorten', [UrlController::class, 'shorten'])->name('shorten');

Route::get('/{short_url}', [UrlController::class, 'show'])->name('show');


// Route::get('/testeee',[UrlController::class, 'teste']);
