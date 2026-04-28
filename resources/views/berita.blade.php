@extends('layouts.app')

@section('content')
<div style="font-family: 'Montserrat', sans-serif;">

    {{-- Banner Atas --}}
    <div style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/Group 70.png') }}'); 
                background-size: cover; background-position: center; height: 300px; display: flex; 
                align-items: center; justify-content: center; margin-bottom: 50px;">
        <h1 style="color: white; font-size: 48px; text-transform: uppercase; font-weight: bold; letter-spacing: 5px;">
            Berita Kami
        </h1>
    </div>

    {{-- Berita Utama (Bisa diambil dari data pertama) --}}
    @if($beritas->count() > 0)
    @php $utama = $beritas->first(); @endphp
    <section class="py-20 bg-white">
        <div class="max-w-[1200px] mx-auto px-5 flex flex-col md:flex-row items-center gap-12">
            <div class="flex-1">
                <img src="{{ asset('storage/berita/' . $utama->gambar) }}" class="w-full h-[400px] object-cover rounded-3xl shadow-lg" alt="Berita Utama">
            </div>
            <div class="flex-1">
                <h2 class="text-3xl font-extrabold uppercase mb-6 leading-tight">{{ $utama->judul }}</h2>
                <p class="text-gray-600 font-bold mb-4 leading-relaxed">
                    {{ Str::limit($utama->isi, 150) }}
                </p>
               <a href="{{ route('berita.detail', $utama->id) }}" class="inline-block bg-black text-white px-8 py-3 font-bold text-xs uppercase tracking-widest">
    Baca Selengkapnya
</a>
            </div>
        </div>
    </section>
    @endif

    {{-- Section Berita Lainnya (Looping dari Database) --}}
    <section class="py-10 bg-white pb-24">
        <div class="max-w-[1200px] mx-auto px-5">
            <h3 class="text-2xl font-extrabold uppercase mb-10">Berita Lainnya</h3>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                {{-- INI BAGIAN YANG DIGANTI, WOK! --}}
                @forelse($beritas as $item)
                <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 flex flex-col">
                    <img src="{{ asset('storage/berita/' . $item->gambar) }}" class="w-full h-48 object-cover" alt="{{ $item->judul }}">
                    <div class="p-6">
                        <h4 class="font-extrabold uppercase text-lg mb-3">{{ $item->judul }}</h4>
                        <p class="text-gray-400 text-sm mb-5 leading-relaxed">
                            {{ Str::limit($item->isi, 80) }}
                        </p>
                        <a href="{{ route('berita.detail', $utama->id) }}" class="text-yellow-600 font-bold text-xs uppercase text-decoration-none">Baca Selengkapnya</a>
                    </div>
                </div>
                @empty
                <div class="col-span-4 text-center py-10">
                    <p class="text-gray-500 italic">Belum ada berita yang diinput.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

</div>
<footer class="bg-[#111111] text-white pt-20 pb-10 px-10 md:px-20">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-16">
            <div>
                <h4 class="text-2xl font-bold mb-8">Tasty Food</h4>
                <p class="text-gray-400 text-sm leading-relaxed mb-8">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
                <div class="flex space-x-4">
                    <a href="#">
                        <img src="{{ asset('images/001-facebook.png') }}" alt="Facebook" class="w-10 h-10 object-contain">
                    </a>
                    <a href="#">
                        <img src="{{ asset('images/002-twitter.png') }}" alt="Twitter" class="w-10 h-10 object-contain">
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-xl font-bold mb-8">Useful links</h4>
                <ul class="text-white text-sm space-y-4">
                    <li><a href="#" class="hover:text-gray-400">Blog</a></li>
                    <li><a href="#" class="hover:text-gray-400">Hewan</a></li>
                    <li><a href="#" class="hover:text-gray-400">Galeri</a></li>
                    <li><a href="#" class="hover:text-gray-400">Testimonial</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xl font-bold mb-8">Privacy</h4>
                <ul class="text-white text-sm space-y-4">
                    <li><a href="#" class="hover:text-gray-400">Karir</a></li>
                    <li><a href="#" class="hover:text-gray-400">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-gray-400">Kontak Kami</a></li>
                    <li><a href="#" class="hover:text-gray-400">Servis</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xl font-bold mb-8">Contact Info</h4>
                <ul class="text-white text-sm space-y-5">
                    <li class="flex items-center">
                        <div class="w-8 h-8 mr-3 flex items-center justify-center">
                            <img src="{{ asset('images/Group 66.png') }}" alt="Email Icon" class="w-full h-full">
                        </div>
                        <span>tastyfood@gmail.com</span>
                    </li>

                    <li class="flex items-center">
                        <div class="w-8 h-8 mr-3 flex items-center justify-center">
                            <img src="{{ asset('images/Group 67.png') }}" alt="Phone Icon" class="w-full h-full">
                        </div>
                        <span>+62 812 3456 7890</span>
                    </li>

                    <li class="flex items-center">
                        <div class="w-8 h-8 mr-3 flex items-center justify-center">
                            <img src="{{ asset('images/Group 68.png') }}" alt="Location Icon" class="w-full h-full">
                        </div>
                        <span>Kota Bandung, Jawa Barat</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="text-center pt-10 border-t border-gray-800">
            <p class="text-gray-500 text-xs font-semibold">
                Copyright ©2023 All rights reserved
            </p>
        </div>
    </div>
</footer>
{{-- Footer tetap panggil yang sudah ada di layout --}}
@endsection