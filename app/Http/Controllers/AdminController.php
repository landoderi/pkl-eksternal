<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        // Data untuk Card (Statistik)
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();
        $totalKontak = Contact::count();

        // Ambil data terbaru untuk Aktivitas Terakhir
        $beritaTerbaru = Berita::latest()->take(3)->get()->map(function($item) {
            $item->aksi = "Menambahkan berita: " . $item->judul;
            $item->tipe = "Berita";
            return $item;
        });

        $galeriTerbaru = Galeri::latest()->take(3)->get()->map(function($item) {
            $item->aksi = "Menambahkan foto galeri baru";
            $item->tipe = "Galeri";
            return $item;
        });

        $kontakTerbaru = Contact::latest()->take(3)->get()->map(function($item) {
            $item->aksi = "Menerima pesan dari: " . $item->nama;
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