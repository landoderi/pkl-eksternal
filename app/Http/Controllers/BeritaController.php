<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    // 1. Tambahkan ini buat halaman Admin (Daftar Berita)
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita', compact('beritas'));
    }

    // 2. Ini yang buat halaman depan tadi (Publik)
    public function indexPublik()
    {
        $beritas = Berita::latest()->get();
        return view('berita', compact('beritas'));
    }
    
    // ... method lain seperti store, create, dll
    public function store(Request $request)
{
    // Validasi dulu biar aman
    $request->validate([
        'judul' => 'required',
        'isi' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg',
    ]);

    $berita = new Berita();
    $berita->judul = $request->judul;
    $berita->isi = $request->isi;

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        
        // Buat nama file unik
        $nama_file = time() . "_" . $file->getClientOriginalName();
        
        // PENTING: Gunakan 'public' sebagai disk-nya
        // Ini akan menyimpan file ke: storage/app/public/berita
        $file->storeAs('berita', $nama_file, 'public'); 
        
        // Simpan nama file ke database
        $berita->gambar = $nama_file;
    }

    $berita->save();

    return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambah!');
}

public function destroy($id)
{
    // 1. Cari data beritanya
    $berita = Berita::findOrFail($id);

    // 2. Hapus fotonya dari folder storage biar gak nyampah
    if ($berita->gambar) {
        Storage::disk('public')->delete('berita/' . $berita->gambar);
    }

    // 3. Hapus data dari database
    $berita->delete();

    // 4. Balik lagi ke halaman admin dengan pesan sukses
    return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus!');
}
}