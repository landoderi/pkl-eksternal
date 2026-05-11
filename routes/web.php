<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Models\Galeri;

// --- HALAMAN PUBLIK ---
Route::get('/', function () { return view('welcome'); });
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/berita', [BeritaController::class, 'indexPublik'])->name('berita');
Route::get('/berita/{id}', [HomeController::class, 'detailBerita'])->name('berita.detail');

// routes/web.php

Route::get('/galeri', function () {
    // Pastikan nama variabel di sini 'galeries'
    $galeries = \App\Models\Galeri::all(); 
    
    // Pastikan di compact juga tertulis 'galeries'
    return view('galeri', compact('galeries')); 
})->name('galeri');

Route::get('/kontak', function () { 
    return view('kontak'); 
})->name('kontak');

// --- AUTH & GOOGLE ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

// --- SIMPAN PESAN KONTAK (DARI USER) ---
Route::post('/contact/send', [ContactController::class, 'store'])->name('contact.store');

// --- HALAMAN TERPROTEKSI (ADMIN) ---
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Kontak Admin (Lihat & Hapus Pesan)
    Route::get('/kontak', [ContactController::class, 'index'])->name('admin.kontak');
    Route::delete('/kontak/{id}', [ContactController::class, 'destroy'])->name('admin.kontak.destroy'); // PINDAH KE SINI BIAR AMAN!
    
    // Galeri Admin
    Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');
    
    // Berita Admin (Otomatis handle Index, Create, Store, Edit, Update, Destroy)
    Route::resource('berita', BeritaController::class)->names([
        'index' => 'admin.berita',
    ]);
});