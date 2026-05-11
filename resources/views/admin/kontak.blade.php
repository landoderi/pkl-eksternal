@extends('layouts.app')

@section('content')
{{-- Background Full Abu-abu --}}
<div class="w-full min-h-screen bg-gray-100 pb-24 md:pb-10" style="font-family: 'Montserrat', sans-serif;">
    
    {{-- Padding Konten --}}
    <div class="p-4 md:p-10">
        
        {{-- HEADER: Stack di mobile --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8 md:mb-10">
            <div>
                <h1 class="text-3xl md:text-4xl font-black uppercase tracking-tighter text-zinc-800">Kelola Kontak</h1>
                <p class="text-[10px] md:text-xs text-gray-400 font-bold uppercase tracking-widest">Tasty Food Management</p>
            </div>
            <a href="{{ route('kontak') }}" class="hidden md:block text-sm font-bold text-gray-500 hover:text-black transition">← Kembali ke Kontak</a>
        </div>

        {{-- TABEL PESAN: Gaya Dashboard --}}
        <div class="bg-white rounded-[25px] md:rounded-[30px] shadow-sm overflow-hidden border">
            <div class="p-5 md:p-6 border-b flex justify-between items-center bg-white">
                <h3 class="font-bold uppercase tracking-widest text-[10px] md:text-sm">Semua Pesan Masuk</h3>
                <span class="md:hidden text-[9px] font-bold text-gray-400 uppercase tracking-widest anim-pulse">Geser →</span>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse min-w-[700px]">
                    <thead class="bg-gray-50 text-[10px] md:text-xs uppercase text-gray-400">
                        <tr>
                            <th class="p-4 font-bold">Pengirim</th>
                            <th class="p-4 font-bold">Subject</th>
                            <th class="p-4 font-bold">Isi Pesan</th>
                            <th class="p-4 font-bold">Waktu</th>
                            <th class="p-4 font-bold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs md:text-sm">
                        @forelse($contacts as $contact)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4">
                                <div class="font-bold text-zinc-800">{{ $contact->name }}</div>
                                <div class="text-[10px] text-gray-400 lowercase">{{ $contact->email }}</div>
                            </td>
                            <td class="p-4">
                                <span class="bg-zinc-100 text-zinc-600 px-2 py-1 rounded-lg text-[10px] font-bold uppercase tracking-tighter">
                                    {{ $contact->subject }}
                                </span>
                            </td>
                            <td class="p-4 text-gray-500 italic leading-relaxed max-w-xs">
                                "{{ Str::limit($contact->message, 50) }}"
                            </td>
                            <td class="p-4 text-gray-400 text-[10px] whitespace-nowrap">
                                {{ $contact->created_at->diffForHumans() }}
                            </td>
                            <td class="p-4 text-center">
                                <form action="{{ route('admin.kontak.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition font-black uppercase text-[10px] tracking-widest">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-10 text-center text-gray-400 italic font-medium">
                                Belum ada pesan yang masuk.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection