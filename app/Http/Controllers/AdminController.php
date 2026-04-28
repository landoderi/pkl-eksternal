<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// --- TAMBAHKAN INI BIAR GAK MERAH ---
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Contact;
use Illuminate\Support\Facades\DB; // Buat jaga-jaga kalau butuh query manual
// ------------------------------------

class AdminController extends Controller
{
    public function index()
    {
        // Pastikan nama Model-nya sama persis dengan yang ada di folder app/Models
        // Kalau nama modelnya 'Beritas' (pakai S), maka ganti di sini juga
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();
        $totalKontak = Contact::count();

        // Ambil data terbaru untuk Aktivitas Terakhir
        $beritaTerbaru = Berita::latest()->take(3)->get()->map(function($item) {
            $item->aksi = "Menambahkan berita: " . ($item->judul ?? 'Tanpa Judul');
            $item->tipe = "Berita";
            return $item;
        });

        $galeriTerbaru = Galeri::latest()->take(3)->get()->map(function($item) {
            $item->aksi = "Menambahkan foto galeri baru";
            $item->tipe = "Galeri";
            return $item;
        });

        $kontakTerbaru = Contact::latest()->take(3)->get()->map(function($item) {
            $item->aksi = "Menerima pesan dari: " . ($item->name ?? 'Anonim');
            $item->tipe = "Kontak";
            return $item;
        });

        // Gabungkan semua aktivitas dan urutkan berdasarkan waktu terbaru
        $aktivitasTerakhir = $beritaTerbaru->concat($galeriTerbaru)->concat($kontakTerbaru)
                            ->sortByDesc('created_at')
                            ->take(5);

        return view('admin.dashboard', compact('totalBerita', 'totalGaleri', 'totalKontak', 'aktivitasTerakhir'));
    }
}