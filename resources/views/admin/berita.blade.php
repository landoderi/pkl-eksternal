@extends('layouts.app')

@section('content')
<div class="w-full min-h-screen bg-gray-100 pb-24 md:pb-10" style="font-family: 'Montserrat', sans-serif;">
    <div class="p-4 md:p-10">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 md:mb-10">
            <div>
                <h1 class="text-3xl md:text-4xl font-black uppercase tracking-tighter text-zinc-800">Kelola Berita</h1>
                <p class="text-[10px] md:text-xs text-gray-400 font-bold uppercase tracking-widest">Tasty Food Management</p>
            </div>
            {{-- Tombol Home disembunyikan di mobile karena sudah ada di navigasi bawah --}}
            <a href="{{ route('berita') }}" class="hidden md:block text-sm font-bold text-gray-500 hover:text-black transition">← Kembali ke Berita</a>
        </div>

    {{-- Form Tambah --}}
    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-[30px] border mb-10">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <input type="text" name="judul" placeholder="Judul Berita" class="border p-4 rounded-xl w-full">
            <input type="file" name="gambar" class="border p-4 rounded-xl w-full">
        </div>
        <textarea name="isi" placeholder="Isi berita..." class="border p-4 rounded-xl w-full mt-4 h-32"></textarea>
        <button type="submit" class="bg-black text-white px-10 py-3 mt-4 rounded-full font-bold uppercase text-xs">Simpan Berita</button>
    </form>

    {{-- Tabel List Berita --}}
    <div class="bg-white rounded-[30px] border overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 border-b">
                <tr>
                    <th class="p-6">Gambar</th>
                    <th class="p-6">Judul</th>
                    <th class="p-6">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($beritas as $b)
                <tr class="border-b">
                    <td class="p-6"><img src="{{ asset('storage/berita/'.$b->gambar) }}" class="w-20 h-20 object-cover rounded-xl"></td>
                    <td class="p-6 font-bold">{{ $b->judul }}</td>
                    <td class="p-6">
                        <form action="{{ route('berita.destroy', $b->id) }}" method="POST">
                            @method('DELETE') @csrf
                            <button class="text-red-600 font-bold uppercase text-xs">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div/>
</div>
@endsection