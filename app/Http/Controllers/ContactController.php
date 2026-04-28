<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
public function store(Request $request)
{
    // Validasi data input
    $validated = $request->validate([
        'subject' => 'required|string|max:255',
        'name'    => 'required|string|max:255',
        'email'   => 'required|email',
        'message' => 'required',
    ]);

    // Simpan data yang sudah divalidasi
    Contact::create($validated);

    return back()->with('success', 'Pesan berhasil dikirim!');

    // Cek manual jika user belum login
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Anda harus login untuk mengirim pesan.');
    }

    // Lanjutkan proses simpan data jika sudah login
    // Contact::create([...]);

    return redirect()->back()->with('success', 'Pesan Anda berhasil terkirim!');
}

    // Ini buat nampilin di dashboard admin
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.kontak', compact('contacts'));
    }
}