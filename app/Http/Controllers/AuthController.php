<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Jangan lupa import model User untuk registrasi
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Fungsi untuk menampilkan halaman Login
    public function showLogin()
    {
        return view('auth.login'); // Pastikan file ada di resources/views/auth/login.blade.php
    }

    // Fungsi untuk menampilkan halaman Register
    public function showRegister()
    {
        return view('auth.register'); // Ini yang tadi dicari Laravel tapi tidak ada
    }

    // Fungsi untuk memproses data Register (POST)
    public function register(Request $request)
    {
        // Contoh validasi sederhana
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'member', // Sesuai rencana kita tadi
        ]);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil!');
    }

    // Fungsi untuk memproses data Login (POST)
public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Ambil data user yang baru login
        $user = Auth::user();

        // LOGIKA REDIRECT YANG SANGAT JELAS:
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard'); // Pakai Nama Route
        }

        return redirect('/home'); // Untuk member
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
}

// Tambahkan juga fungsi Logout sekalian biar lengkap, cuy!
public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
}
}