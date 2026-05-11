@extends('layouts.app')

@section('content')

{{-- 1. HERO SECTION --}}
{{-- 1. HERO SECTION --}}
<section class="relative min-h-screen flex flex-col px-6 md:px-20 py-10 overflow-hidden">
    @include('layouts.navbar')

    {{-- Container utama: Di PC menyamping (row), di Mobile tumpuk (col) --}}
    <div class="flex-1 flex flex-col md:flex-row items-center justify-between gap-10 mt-10 md:mt-0">
        
        {{-- Sisi Kiri: Teks --}}
        <div class="w-full md:w-1/2 text-center md:text-left z-10" data-aos="fade-right" data-aos-duration="1000">
            <div class="w-16 h-1 bg-black mb-6 mx-auto md:mx-0"></div>
            <h2 class="text-4xl md:text-7xl font-normal leading-tight mb-6 uppercase">
                Healthy <br> <span class="font-bold">Tasty Food</span>
            </h2>
            <p class="text-gray-600 mb-10 leading-relaxed text-sm md:text-lg max-w-lg mx-auto md:mx-0">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue non elementum commodo, elit libero convallis nunc.
            </p>
            <a href="{{ route('about') }}" class="inline-block bg-black text-white px-12 py-4 uppercase text-xs font-bold tracking-[3px] hover:bg-zinc-800 transition-all hover:scale-105 shadow-xl">
                Tentang Kami
            </a>
        </div>

        {{-- Sisi Kanan: Gambar --}}
        <div class="w-full md:w-1/2 flex justify-center md:justify-end" data-aos="zoom-out" data-aos-delay="500">
            <img src="{{ asset('images/img-4.png') }}" 
                 class="w-full max-w-[400px] md:max-w-none md:w-[120%] h-auto object-contain md:-mr-20" 
                 alt="Hero Food">
        </div>

    </div>
</section>

{{-- 2. SECTION CARDS --}}
{{-- 2. SECTION CARDS --}}
<section class="relative py-16 md:py-24 bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('images/Group 70.png') }}')">
    {{-- Overlay tipis biar background tetep dapet feel-nya --}}
    <div class="absolute inset-0 bg-black/5 backdrop-blur-[1px]"></div>

    <div class="container mx-auto px-6 md:px-10 relative z-10">
        
        {{-- INI VARIABELNYA JANGAN SAMPE HILANG WOK --}}
        @php
            $cards = [
                ['img' => 'img-1.png', 'title' => 'LOREM IPSUM', 'delay' => '0'],
                ['img' => 'img-2.png', 'title' => 'LOREM IPSUM', 'delay' => '200'],
                ['img' => 'img-3.png', 'title' => 'LOREM IPSUM', 'delay' => '400'],
                ['img' => 'img-4.png', 'title' => 'LOREM IPSUM', 'delay' => '600'],
            ];
        @endphp

        {{-- Grid 2 kolom di mobile biar ramping & background kelihatan --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-12">
            @foreach($cards as $card)
            <div class="bg-white/90 backdrop-blur-sm p-5 md:p-10 rounded-2xl md:rounded-3xl text-center shadow-xl relative mt-12 md:mt-0 transition-transform hover:-translate-y-2 duration-300"
                 data-aos="fade-up" data-aos-delay="{{ $card['delay'] }}">
                
                {{-- Lingkaran gambar mungil buat mobile --}}
                <div class="absolute -top-10 md:-top-14 left-1/2 transform -translate-x-1/2">
                    <div class="p-1.5 bg-white rounded-full shadow-md">
                        <img src="{{ asset('images/' . $card['img']) }}" 
                             class="w-16 h-16 md:w-24 md:h-24 rounded-full object-cover border-2 md:border-4 border-gray-50 shadow-inner">
                    </div>
                </div>

                <h4 class="mt-8 md:mt-14 font-black uppercase mb-2 md:mb-4 tracking-wider text-gray-800 text-[10px] md:text-sm">
                    {{ $card['title'] }}
                </h4>
                <p class="text-[9px] md:text-sm text-gray-500 leading-tight md:leading-relaxed">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                </p>
            </div>
            @endforeach
        </div>
    </div>
</section>
{{-- 3. BERITA KAMI (DYNAMIC) --}}
<section class="py-24 px-6 md:px-20 bg-[#f9f9f9] overflow-hidden">
    <h3 class="text-4xl font-black text-center uppercase mb-16 tracking-widest text-gray-900" data-aos="fade-down">Berita Kami</h3>
    
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        @if($beritas->count() > 0)
            @php $utama = $beritas->first(); @endphp
            {{-- Berita Utama --}}
            <div class="lg:col-span-6 bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col"
                 data-aos="fade-right" data-aos-duration="1000">
                <img src="{{ asset('storage/berita/' . $utama->gambar) }}" class="w-full h-[450px] object-cover hover:scale-105 transition duration-700" alt="{{ $utama->judul }}">
                <div class="p-10 flex-1">
                    <h4 class="font-bold text-2xl uppercase mb-4 leading-tight">{{ $utama->judul }}</h4>
                    <p class="text-gray-500 mb-8 leading-relaxed">
                        {{ Str::limit($utama->isi, 150) }}
                    </p>
                    <a href="{{ route('berita.detail', $utama->id) }}" class="inline-block bg-black text-white px-8 py-3 font-bold text-xs uppercase tracking-widest hover:bg-gray-800 transition-all">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>

            {{-- Grid Berita Kecil --}}
            <div class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach($beritas->skip(1)->take(4) as $index => $news)
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all"
                     data-aos="fade-left" data-aos-delay="{{ $index * 150 }}">
                    <img src="{{ asset('storage/berita/' . $news->gambar) }}" class="w-full h-44 object-cover">
                    <div class="p-6">
                        <h4 class="font-bold uppercase text-sm mb-2 text-gray-800">{{ $news->judul }}</h4>
                        <p class="text-gray-500 text-xs mb-4 leading-relaxed">{{ Str::limit($news->isi, 50) }}</p>
                        <a href="{{ route('berita.detail', $news->id) }}" class="text-yellow-600 font-extrabold text-[10px] uppercase tracking-tighter border-b-2 border-yellow-600 pb-1 hover:text-black hover:border-black transition-all">Selengkapnya</a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="col-span-12 text-center text-gray-500 italic">Belum ada berita.</div>
        @endif
    </div>
</section>

{{-- 4. GALERI KAMI --}}
<section class="py-20 px-10 md:px-20 text-center bg-white">
    <h3 class="text-2xl font-bold uppercase mb-12 tracking-widest" data-aos="fade-up">Galeri Kami</h3>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        @foreach($galeris as $index => $gl)
            <div class="rounded-xl overflow-hidden shadow-md h-80 group" 
                 data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                <img src="{{ asset('storage/galeri/' . $gl->foto) }}" 
                     class="w-full h-full object-cover group-hover:scale-110 transition duration-500"
                     onerror="this.src='{{ asset('images/no-image.png') }}'">
            </div>
        @endforeach
    </div>

    <div data-aos="fade-up">
        <a href="{{ route('galeri') }}">
            <button class="bg-black text-white px-16 py-3 uppercase text-sm font-bold tracking-widest hover:bg-gray-800 transition-all hover:px-20">
                Lihat Lebih Banyak
            </button>
        </a>
    </div>
</section>

{{-- Footer --}}
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