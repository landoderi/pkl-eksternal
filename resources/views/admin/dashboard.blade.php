@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100" style="font-family: 'Montserrat', sans-serif;">
    

    <div class="flex-1 p-10">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-extrabold uppercase">Dashboard</h1>
                <p class="text-gray-500">Selamat datang kembali, {{ auth()->user()->name }}!</p>
            </div>
            <div class="bg-white px-4 py-2 rounded-xl shadow-sm border flex items-center gap-3">
                <div class="w-8 h-8 bg-black rounded-full flex items-center justify-center text-white text-xs">
                    {{ substr(auth()->user()->name, 0, 1) }}
                </div>
                <span class="font-bold text-sm">{{ auth()->user()->role }}</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
    <div class="bg-white p-6 rounded-[25px] shadow-sm border-l-8 border-black">
        <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Total Berita</p>
        <h3 class="text-3xl font-black mt-1">{{ $totalBerita }}</h3>
    </div>

    <div class="bg-white p-6 rounded-[25px] shadow-sm border-l-8 border-gray-400">
        <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Total Galeri</p>
        <h3 class="text-3xl font-black mt-1">{{ $totalGaleri }}</h3>
    </div>

    <div class="bg-white p-6 rounded-[25px] shadow-sm border-l-8 border-gray-200">
        <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Pesan Masuk</p>
        <h3 class="text-3xl font-black mt-1">{{ $totalKontak }}</h3>
    </div>
</div>

<div class="bg-white rounded-[30px] shadow-sm overflow-hidden border">
    <div class="p-6 border-b">
        <h3 class="font-bold uppercase tracking-widest text-sm">Aktivitas Terakhir</h3>
    </div>
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 text-xs uppercase text-gray-400">
            <tr>
                <th class="p-4 font-bold">Kategori</th>
                <th class="p-4 font-bold">Aksi</th>
                <th class="p-4 font-bold">Waktu</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            @forelse($aktivitasTerakhir as $aktivitas)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="p-4">
                    <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider 
                        {{ $aktivitas->tipe == 'Berita' ? 'bg-blue-100 text-blue-600' : '' }}
                        {{ $aktivitas->tipe == 'Galeri' ? 'bg-purple-100 text-purple-600' : '' }}
                        {{ $aktivitas->tipe == 'Kontak' ? 'bg-green-100 text-green-600' : '' }}">
                        {{ $aktivitas->tipe }}
                    </span>
                </td>
                <td class="p-4 font-medium">{{ $aktivitas->aksi }}</td>
                <td class="p-4 text-gray-500">{{ $aktivitas->created_at->diffForHumans() }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="p-10 text-center text-gray-400 italic">Belum ada aktivitas terbaru.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
    </div>
</div>
@endsection