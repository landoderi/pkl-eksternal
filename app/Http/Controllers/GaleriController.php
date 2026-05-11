<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri; // WAJIB ADA: Biar bisa ambil data dari database

class GaleriController extends Controller
{
    // Ini fungsi yang dicari Laravel (index)
    public function index()
    {
        // 1. Ambil semua data foto dari tabel galeris
        $galeris = Galeri::all();

        // 2. Tampilkan halaman admin/galeri.blade.php sambil bawa data foto
        return view('admin.galeri', compact('galeris'));
    }

    // Fungsi untuk simpan foto (Store)
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg',
        ]);

if($request->hasFile('foto')){  
    $file = $request->file('foto');
    // Hilangkan spasi dan tambahkan timestamp
    $nama_file = time() . "_" . str_replace(' ', '_', $file->getClientOriginalName());
    $file->storeAs('galeri', $nama_file, 'public');
    
    // Simpan ke database
Galeri::create([
    'foto' => $nama_file, // Di DB cuma nyimpen "12345_foto.jpg"
    'judul' => $request->judul
]);
}

        return back()->with('success', 'Foto berhasil ditambahkan!');
    }

    // Fungsi untuk hapus foto (Destroy)
public function destroy($id)
{
    $galeri = Galeri::findOrFail($id);
    
    // Ganti ini! Karena kamu nyimpennya di storage/public/galeri, bukan di public/images
    if (\Storage::disk('public')->exists('galeri/' . $galeri->foto)) {
        \Storage::disk('public')->delete('galeri/' . $galeri->foto);
    }

    $galeri->delete();
    return back()->with('success', 'Foto berhasil dihapus!');
}
}