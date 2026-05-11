@extends('layouts.app')

@section('content')
{{-- 1. Gunakan 'w-full' dan hapus padding luar 'p-4' agar warna abu mentok ke pinggir layar --}}
<div class="w-full min-h-screen bg-gray-100 pb-24 md:pb-10" style="font-family: 'Montserrat', sans-serif;">
    
    {{-- 2. Padding dipindahkan ke div dalam ini agar konten tetap punya jarak aman --}}
    <div class="p-4 md:p-10">
        
        {{-- Header: Stack di mobile, Row di PC --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 md:mb-10">
            <div>
                <h1 class="text-3xl md:text-4xl font-black uppercase tracking-tighter text-zinc-800">Dashboard</h1>
                <p class="text-[10px] md:text-xs text-gray-400 font-bold uppercase tracking-widest">Selamat Datang Kembali, Admin!</p>
            </div>
            {{-- Tombol Home disembunyikan di mobile karena sudah ada di navigasi bawah --}}
            <a href="{{ route('home') }}" class="hidden md:block text-sm font-bold text-gray-500 hover:text-black transition">← Kembali ke Home</a>
        </div>

        {{-- Statistik Cards: Grid 1 kolom di mobile, 3 di PC --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-8 md:mb-10">
            <div class="bg-white p-6 rounded-[25px] shadow-sm border-l-8 border-black transition-transform active:scale-95 md:hover:scale-[1.02]">
                <p class="text-gray-400 text-[10px] md:text-xs font-bold uppercase tracking-wider">Total Berita</p>
                <h3 class="text-3xl font-black mt-1">{{ $totalBerita }}</h3>
            </div>

            <div class="bg-white p-6 rounded-[25px] shadow-sm border-l-8 border-zinc-400 transition-transform active:scale-95 md:hover:scale-[1.02]">
                <p class="text-gray-400 text-[10px] md:text-xs font-bold uppercase tracking-wider">Total Galeri</p>
                <h3 class="text-3xl font-black mt-1">{{ $totalGaleri }}</h3>
            </div>

            <div class="bg-white p-6 rounded-[25px] shadow-sm border-l-8 border-zinc-200 transition-transform active:scale-95 md:hover:scale-[1.02]">
                <p class="text-gray-400 text-[10px] md:text-xs font-bold uppercase tracking-wider">Pesan Masuk</p>
                <h3 class="text-3xl font-black mt-1">{{ $totalKontak }}</h3>
            </div>
        </div>

        {{-- Tabel Aktivitas: Pakai overflow-x-auto supaya aman di mobile --}}
        <div class="bg-white rounded-[25px] md:rounded-[30px] shadow-sm overflow-hidden border">
            <div class="p-5 md:p-6 border-b bg-white flex justify-between items-center">
                <h3 class="font-bold uppercase tracking-widest text-xs md:text-sm">Aktivitas Terakhir</h3>
                {{-- Indikator geser untuk user mobile --}}
                <span class="md:hidden text-[9px] font-bold text-gray-400 uppercase tracking-widest anim-pulse">Geser →</span>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[600px]">
                    <thead class="bg-gray-50 text-[10px] md:text-xs uppercase text-gray-400">
                        <tr>
                            <th class="p-4 font-bold">Kategori</th>
                            <th class="p-4 font-bold">Aksi</th>
                            <th class="p-4 font-bold text-right md:text-left">Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs md:text-sm">
                        @forelse($aktivitasTerakhir as $aktivitas)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4">
                                <span class="px-3 py-1 rounded-full text-[9px] font-bold uppercase tracking-wider 
                                    {{ $aktivitas->tipe == 'Berita' ? 'bg-blue-100 text-blue-600' : '' }}
                                    {{ $aktivitas->tipe == 'Galeri' ? 'bg-purple-100 text-purple-600' : '' }}
                                    {{ $aktivitas->tipe == 'Kontak' ? 'bg-green-100 text-green-600' : '' }}">
                                    {{ $aktivitas->tipe }}
                                </span>
                            </td>
                            <td class="p-4 font-medium text-zinc-700">{{ $aktivitas->aksi }}</td>
                            <td class="p-4 text-gray-400 text-right md:text-left whitespace-nowrap">
                                {{ $aktivitas->created_at->diffForHumans() }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="p-10 text-center text-gray-400 italic font-medium">Belum ada aktivitas terbaru.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection