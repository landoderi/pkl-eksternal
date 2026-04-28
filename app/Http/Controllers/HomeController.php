<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; // Import model Berita
use App\Models\Galeri; // Import model Galeri

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data berita terbaru
        $beritas = Berita::latest()->get();

        // Ambil data galeri terbaru (misal maksimal 6 foto)
        $galeris = Galeri::latest()->take(6)->get();

        // Kirim semua variabel ke view home
        return view('home', compact('beritas', 'galeris'));
    }

    public function detailBerita($id)
{
    $berita = Berita::findOrFail($id);
    return view('berita_detail', compact('berita'));
}
}