<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

// Halaman pilih nama
Route::get('/', function () {
    return view('select-name');
});

// Simpan nama ke session
Route::post('/setname', function (\Illuminate\Http\Request $request) {
    session(['sender_name' => $request->name]);
    return redirect('/chat');
});

// Halaman chat utama
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

// API kirim & ambil pesan
Route::post('/send', [ChatController::class, 'sendMessage'])->name('send.message');
Route::get('/messages', [ChatController::class, 'fetchMessages'])->name('fetch.messages');
