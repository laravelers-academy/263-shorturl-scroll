<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
	
    return view('dashboard');

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('{code}', 'App\Http\Controllers\UrlController@show');

Route::post('url', 'App\Http\Controllers\UrlController@store');

// INFINITIE SCROLL
Route::get('url/index', 'App\Http\Controllers\UrlController@index');

