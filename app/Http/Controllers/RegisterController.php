<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
public function register(Request $request)
{
    // Validasi ini yang bakal nahan kalau password beda
$request->validate([
    'name'     => 'required|string|max:255',
    'email'    => 'required|string|email|max:255|unique:users',
    'password' => 'required|string|min:8|confirmed',
], [
    // Tulis pesan error dalam Bahasa Indonesia di sini
    'name.required'      => 'Namanya jangan dikosongin.',
    'email.required'     => 'Email wajib diisi ya.',
    'email.email'        => 'Format emailnya yang bener dong.',
    'email.unique'       => 'Email ini udah ada yang punya.',
    'password.required'  => 'Passwordnya diisi dulu.',
    'password.min'       => 'Password minimal harus 8 karakter, Wok!',
    'password.confirmed' => 'Password sama konfirmasinya nggak cocok tuh.',
]);

    // Kalau lolos validasi, baru eksekusi simpan
    User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'role'     => 'member',
    ]);

    return redirect()->route('home')->with('success', 'Akun berhasil dibuat!');
}
}