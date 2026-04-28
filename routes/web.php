<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ContactController;
use App\Models\Galeri;
// Tambahkan ini di bagian paling atas file web.php
use App\Http\Controllers\BeritaController;

// --- HALAMAN PUBLIK ---
Route::get('/', function () { return view('welcome'); });
// Ganti yang lama jadi ini:
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/berita', [BeritaController::class, 'indexPublik'])->name('berita');

// PERBAIKAN DI SINI: Tambahkan ->name('galeri')
Route::get('/galeri', function () {
    $galeris = Galeri::all(); 
    return view('galeri', compact('galeris')); 
})->name('galeri');

// PERBAIKAN DI SINI: Tambahkan ->name('kontak')
Route::get('/kontak', function () { 
    return view('kontak'); 
})->name('kontak');

// --- AUTH (LOGIN & REGISTER) ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- SIMPAN PESAN KONTAK (PUBLIC) ---
Route::post('/contact/send', [ContactController::class, 'store'])->name('contact.store');

// --- HALAMAN TERPROTEKSI (ADMIN) ---
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Kontak Admin
    Route::get('/kontak', [ContactController::class, 'index'])->name('admin.kontak');
    
    // Galeri Admin
    Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');
    
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // ... route yang sudah ada ...

    // Route Resource Berita (Otomatis handle Index, Create, Store, Edit, Update, Destroy)
    Route::resource('berita', BeritaController::class)->names([
        'index' => 'admin.berita',
    ]);
});

Route::delete('/admin/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

Route::get('/berita/{id}', [App\Http\Controllers\HomeController::class, 'detailBerita'])->name('berita.detail');