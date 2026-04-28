@extends('layouts.app')

@section('content')

<section class="relative min-h-screen flex flex-col items-start px-10 md:px-20 py-10">
    @include('layouts.navbar')

    <div class="max-w-xl mt-32">
        <div class="w-16 h-1 bg-black mb-4"></div>
        <h2 class="text-6xl font-normal leading-tight mb-4 uppercase">Healthy <br> <span class="font-bold">Tasty Food</span></h2>
        <p class="text-gray-600 mb-8 leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue non elementum commodo, elit libero convallis nunc, eget varius.
        </p>
       <a href="{{ route('about') }}" class="inline-block bg-black text-white px-10 py-3 uppercase text-sm font-bold tracking-widest hover:bg-gray-800 transition-all">
    Tentang Kami
</a>
    </div>

    <img src="{{ asset('images/img-4.png') }}" class="absolute top-100 right-0 w-1/2 h-auto -z-10" alt="Hero Food">
</section>

{{-- SECTION CARDS (BISA DIBUAT DYNAMIC JUGA JIKA MAU) --}}
<section class="relative py-20 bg-cover bg-center" style="background-image: url('{{ asset('images/Group 70.png') }}')">
    <div class="container mx-auto px-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-12">
            @php
                $cards = [
                    ['img' => 'img-1.png', 'title' => 'LOREM IPSUM'],
                    ['img' => 'img-2.png', 'title' => 'LOREM IPSUM'],
                    ['img' => 'img-3.png', 'title' => 'LOREM IPSUM'],
                    ['img' => 'img-4.png', 'title' => 'LOREM IPSUM'],
                ];
            @endphp

            @foreach($cards as $card)
            <div class="bg-white p-10 rounded-3xl text-center shadow-2xl relative mt-16 md:mt-0 transition-transform hover:-translate-y-2 duration-300">
                <div class="absolute -top-14 left-1/2 transform -translate-x-1/2">
                    <div class="p-2 bg-white rounded-full shadow-md">
                        <img src="{{ asset('images/' . $card['img']) }}" class="w-24 h-24 rounded-full object-cover border-4 border-gray-50 shadow-inner">
                    </div>
                </div>
                <h4 class="mt-14 font-black uppercase mb-4 tracking-wider text-gray-800">{{ $card['title'] }}</h4>
                <p class="text-sm text-gray-500 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 4. BERITA KAMI (DYNAMIC DARI DATABASE) --}}
<section class="py-24 px-6 md:px-20 bg-[#f9f9f9]">
    <h3 class="text-4xl font-black text-center uppercase mb-16 tracking-widest text-gray-900">Berita Kami</h3>
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        @if($beritas->count() > 0)
            {{-- Berita Utama (Ambil 1 yang terbaru) --}}
            @php $utama = $beritas->first(); @endphp
            <div class="lg:col-span-6 bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-shadow duration-300 flex flex-col">
                <img src="{{ asset('storage/berita/' . $utama->gambar) }}" class="w-full h-[450px] object-cover" alt="{{ $utama->judul }}">
                <div class="p-10 flex-1">
                    <h4 class="font-bold text-2xl uppercase mb-4 leading-tight">{{ $utama->judul }}</h4>
                    <p class="text-gray-500 mb-8 leading-relaxed">
                        {{ Str::limit($utama->isi, 150) }}
                    </p>
                    <a href="{{ route('berita.detail', $utama->id) }}" class="inline-block bg-black text-white px-8 py-3 font-bold text-xs uppercase tracking-widest">
    Baca Selengkapnya
</a>
                </div>
            </div>

            {{-- Grid Berita Kecil (Sisa berita lainnya, maksimal 4) --}}
            <div class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach($beritas->skip(1)->take(4) as $news)
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all">
                    <img src="{{ asset('storage/berita/' . $news->gambar) }}" class="w-full h-44 object-cover">
                    <div class="p-6">
                        <h4 class="font-bold uppercase text-sm mb-2 text-gray-800">{{ $news->judul }}</h4>
                        <p class="text-gray-500 text-xs mb-4 leading-relaxed">{{ Str::limit($news->isi, 50) }}</p>
                        <a href="#" class="text-yellow-600 font-extrabold text-[10px] uppercase tracking-tighter border-b-2 border-yellow-600 pb-1">Selengkapnya</a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="col-span-12 text-center text-gray-500 italic">Belum ada berita.</div>
        @endif
    </div>
</section>

{{-- GALERI KAMI (DYNAMIC DARI DATABASE) --}}
<section class="py-20 px-10 md:px-20 text-center bg-white">
    <h3 class="text-2xl font-bold uppercase mb-12 tracking-widest">Galeri Kami</h3>
    
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
@foreach($galeris as $gl)
    <div class="rounded-xl overflow-hidden shadow-md h-80">
        {{-- WAJIB pakai $gl->foto karena di DB namanya 'foto' --}}
        <img src="{{ asset('storage/galeri/' . $gl->foto) }}" 
             class="w-full h-full object-cover"
             onerror="this.src='{{ asset('images/no-image.png') }}'">
    </div>
@endforeach
</div>

<a href="{{ route('galeri') }}">
    <button class="bg-black text-white px-16 py-3 uppercase text-sm font-bold tracking-widest hover:bg-gray-800 transition-all">
        Lihat Lebih Banyak
    </button>
</a>
</section>

{{-- Footer Tetap Sama --}}
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

@endsection