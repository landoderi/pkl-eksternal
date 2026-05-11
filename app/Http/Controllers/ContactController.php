<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // 1. Fungsi Simpan Pesan (Dari halaman depan)
    public function store(Request $request)
    {
        // CEK LOGIN DULU: Pindahkan ke paling atas biar gak kerja dua kali
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Anda harus login untuk mengirim pesan.');
        }

        // Validasi data input
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required',
        ]);

        // Simpan data
        Contact::create($validated);

        // Langsung return ke halaman sebelumnya
        return back()->with('success', 'Pesan Anda berhasil terkirim!');
    }

    // 2. Fungsi Nampilin di Dashboard Admin
    public function index()
    {
        // Ambil data terbaru
        $contacts = Contact::latest()->get();
        
        // Pastikan path view-nya benar (admin.kontak atau admin.kontak.index?)
        return view('admin.kontak', compact('contacts'));
    }

    // 3. Tambahan: Fungsi Hapus (Biar admin bisa beresin pesan lama)
    public function destroy(int $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return back()->with('success', 'Pesan berhasil dihapus!');
    }
}