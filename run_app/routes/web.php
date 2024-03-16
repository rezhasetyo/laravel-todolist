<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\TanggalController;
use App\Http\Controllers\TodolistController;

Auth::routes();
Route::get('/', function () {
    return view('home');
});

Route::resource('/kategori', KategoriController::class);
Route::resource('/tanggal', TanggalController::class);
Route::resource('/todolist', TodolistController::class);

Route::get('tanggal/total-jam/{id}', [TanggalController::class, 'totalJam']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
