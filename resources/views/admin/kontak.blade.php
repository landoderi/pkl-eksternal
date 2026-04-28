@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100" style="font-family: 'Montserrat', sans-serif;">
    


    {{-- MAIN CONTENT --}}
    <div class="flex-1 p-10">
        
        {{-- HEADER (Sama dengan Dashboard) --}}
 <div class="flex justify-between items-center mb-10">
        <div>
            <h1 class="text-3xl font-black uppercase tracking-tighter text-zinc-800">Kelola Kontak</h1>
            <p class="text-xs text-gray-400 font-bold uppercase tracking-widest">Tasty Food Management</p>
        </div>
        <a href="{{ route('kontak') }}" class="text-sm font-bold text-gray-500 hover:text-black transition">← Kembali ke Kontak</a>
    </div>
        {{-- STATS KECIL (Opsional, biar makin mirip) --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-[25px] shadow-sm border-l-8 border-yellow-500">
                <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Total Pesan</p>
                <h3 class="text-3xl font-black mt-1">{{ $contacts->count() }}</h3>
            </div>
        </div>

        {{-- TABEL PESAN (Gaya Dashboard) --}}
        <div class="bg-white rounded-[30px] shadow-sm overflow-hidden border">
            <div class="p-6 border-b flex justify-between items-center">
                <h3 class="font-bold uppercase tracking-widest text-sm">Semua Kontak</h3>
                <span class="text-[10px] bg-gray-100 px-3 py-1 rounded-full font-bold text-gray-400">DATABASE</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 text-xs uppercase text-gray-400">
                        <tr>
                            <th class="p-4 font-bold">Nama & Email</th>
                            <th class="p-4 font-bold">Subject</th>
                            <th class="p-4 font-bold">Pesan</th>
                            <th class="p-4 font-bold">Waktu</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @forelse($contacts as $contact)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4">
                                <div class="font-bold text-gray-800">{{ $contact->name }}</div>
                                <div class="text-xs text-gray-400">{{ $contact->email }}</div>
                            </td>
                            <td class="p-4 text-gray-700 font-medium">
                                <span class="bg-gray-100 px-2 py-1 rounded text-[11px]">{{ $contact->subject }}</span>
                            </td>
                            <td class="p-4 text-gray-500 italic leading-relaxed">
                                "{{ Str::limit($contact->message, 60) }}"
                            </td>
                            <td class="p-4 text-gray-400 text-xs">
                                {{ $contact->created_at->diffForHumans() }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-10 text-center text-gray-400 italic">
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