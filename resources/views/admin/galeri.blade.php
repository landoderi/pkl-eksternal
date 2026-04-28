@extends('layouts.app')

@section('content')
<div class="p-10" style="font-family: 'Montserrat', sans-serif;">
    <div class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-zinc-800">Kelola Galeri</h1>
            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">Tasty Food Management</p>
        </div>
        <a href="{{ route('galeri') }}" class="text-sm font-bold text-gray-500 hover:text-black transition">← Kembali ke Galeri</a>
    </div>

    <div class="bg-white p-8 rounded-[40px] shadow-sm border border-gray-200 mb-10">
        <h2 class="text-sm font-bold mb-6 uppercase tracking-widest text-zinc-400">Tambah Foto Baru</h2>
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col lg:flex-row gap-6 items-end">
            @csrf
            <div class="flex-1 w-full text-left">
                <label class="block text-[10px] font-bold text-zinc-400 uppercase mb-3 ml-1">Pilih File Foto</label>
                <input type="file" name="foto" required class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:bg-black file:text-white cursor-pointer">
            </div>
            <div class="flex-1 w-full text-left">
                <label class="block text-[10px] font-bold text-zinc-400 uppercase mb-3 ml-1">Keterangan</label>
                <input type="text" name="judul" placeholder="Contoh: Menu Cafe" class="w-full p-2.5 border border-gray-100 rounded-xl text-sm">
            </div>
            <button type="submit" class="bg-black text-white px-10 py-3 rounded-xl font-black uppercase text-[10px] tracking-widest hover:bg-zinc-800 transition shadow-lg">Upload</button>
        </form>
    </div>

   @extends('layouts.app')

@section('content')
<div class="p-10" style="font-family: 'Montserrat', sans-serif;">
    <div class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-zinc-800">Kelola Galeri</h1>
            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">Tasty Food Management</p>
        </div>
        <a href="{{ route('galeri') }}" class="text-sm font-bold text-gray-500 hover:text-black transition">← Kembali ke Galeri</a>
    </div>

    <div class="bg-white p-8 rounded-[40px] shadow-sm border border-gray-200 mb-10">
        <h2 class="text-sm font-bold mb-6 uppercase tracking-widest text-zinc-400">Tambah Foto Baru</h2>
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col lg:flex-row gap-6 items-end">
            @csrf
            <div class="flex-1 w-full text-left">
                <label class="block text-[10px] font-bold text-zinc-400 uppercase mb-3 ml-1">Pilih File Foto</label>
                <input type="file" name="foto" required class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:bg-black file:text-white cursor-pointer">
            </div>
            <div class="flex-1 w-full text-left">
                <label class="block text-[10px] font-bold text-zinc-400 uppercase mb-3 ml-1">Keterangan</label>
                <input type="text" name="judul" placeholder="Contoh: Menu Cafe" class="w-full p-2.5 border border-gray-100 rounded-xl text-sm">
            </div>
            <button type="submit" class="bg-black text-white px-10 py-3 rounded-xl font-black uppercase text-[10px] tracking-widest hover:bg-zinc-800 transition shadow-lg">Upload</button>
        </form>
    </div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($galeris as $g)
        <div class="bg-white rounded-[30px] overflow-hidden shadow-sm border border-gray-100 group">
            <div class="h-48 overflow-hidden relative">
                {{-- Ganti $item->gambar jadi $g->foto --}}
                <img src="{{ asset('storage/galeri/' . $g->foto) }}" 
                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                     onerror="this.src='{{ asset('images/no-image.png') }}'">
                
                <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                    <form action="{{ route('admin.galeri.destroy', $g->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="bg-white text-red-500 p-3 rounded-full shadow-xl font-bold text-xs uppercase">
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
            <div class="p-4">
                {{-- Pakai $g juga di sini --}}
                <h3 class="text-[10px] font-bold text-zinc-800 uppercase">{{ $g->judul ?? 'Untitled' }}</h3>
            </div>
        </div>
    @endforeach
</div>
</div>
@endsection
</div>
@endsection