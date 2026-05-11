@extends('layouts.app')

@section('content')
{{-- Background Full Abu-abu --}}
<div class="w-full min-h-screen bg-gray-100 pb-24 md:pb-10" style="font-family: 'Montserrat', sans-serif;">
    
    {{-- Padding Konten --}}
    <div class="p-4 md:p-10">
        
{{-- HEADER: Diperbaiki biar gak tabrakan di mobile --}}
<div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 md:mb-10">
    <div>
        {{-- tracking-tighter dikurangi dikit biar gak terlalu nempel pas di layar kecil --}}
        <h1 class="text-3xl md:text-4xl font-black uppercase tracking-tight md:tracking-tighter text-zinc-800 leading-none">
            Kelola Galeri
        </h1>
        <p class="text-[10px] md:text-xs text-gray-400 font-bold uppercase tracking-widest mt-2">
            Tasty Food Management
        </p>
    </div>

    {{-- Link Home: Di mobile dikasih margin top dikit biar gak nempel ke sub-header --}}
    <a href="{{ route('galeri') }}" class="hidden md:block text-sm font-bold text-gray-500 hover:text-black transition">
        <span>←</span> Kembali ke Galeri
    </a>
</div>

        {{-- FORM INPUT: Responsif --}}
        <div class="bg-white p-6 md:p-8 rounded-[30px] md:rounded-[40px] shadow-sm border border-gray-200 mb-8 md:mb-10">
            <h2 class="text-[10px] md:text-xs font-bold mb-6 uppercase tracking-widest text-zinc-400">Tambah Foto Baru</h2>
            
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col lg:flex-row gap-6 items-end">
                @csrf
                <div class="w-full lg:flex-1 text-left">
                    <label class="block text-[9px] md:text-[10px] font-bold text-zinc-400 uppercase mb-3 ml-1">Pilih File Foto</label>
                    {{-- Input file yang lebih bersahabat di mobile --}}
                    <input type="file" name="foto" required class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:uppercase file:bg-black file:text-white cursor-pointer bg-zinc-50 p-2 rounded-2xl border border-dashed border-zinc-200">
                </div>
                
                <div class="w-full lg:flex-1 text-left">
                    <label class="block text-[9px] md:text-[10px] font-bold text-zinc-400 uppercase mb-3 ml-1">Keterangan</label>
                    <input type="text" name="judul" placeholder="Contoh: Menu Cafe" class="w-full p-3 md:p-2.5 border border-zinc-100 bg-zinc-50 rounded-xl text-sm focus:ring-2 focus:ring-black outline-none transition">
                </div>
                
                <button type="submit" class="w-full lg:w-auto bg-black text-white px-10 py-4 md:py-3 rounded-xl font-black uppercase text-[10px] tracking-widest hover:bg-zinc-800 active:scale-95 transition shadow-lg">
                    Upload
                </button>
            </form>
        </div>

        {{-- LIST GALLERY: Grid yang aman di semua layar --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
            @foreach($galeris as $g)
                <div class="bg-white rounded-[25px] md:rounded-[30px] overflow-hidden shadow-sm border border-gray-100 group">
                    <div class="h-56 md:h-48 overflow-hidden relative">
                        <img src="{{ asset('storage/galeri/' . $g->foto) }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                             onerror="this.src='{{ asset('images/no-image.png') }}'">
                        
                        {{-- Overlay Hapus: Di mobile muncul tombolnya langsung biar gampang --}}
                        <div class="absolute inset-0 bg-black/40 md:bg-black/60 opacity-100 md:opacity-0 md:group-hover:opacity-100 transition flex items-center justify-center">
                            <form action="{{ route('admin.galeri.destroy', $g->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="bg-white text-red-600 px-6 py-2.5 rounded-full shadow-2xl font-black text-[10px] uppercase tracking-tighter active:scale-90 transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="text-[10px] font-bold text-zinc-800 uppercase tracking-wider">{{ $g->judul ?? 'Untitled' }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection