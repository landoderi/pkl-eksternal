@extends('layouts.app')

@section('content')
<div class="overflow-hidden" style="font-family: 'Montserrat', sans-serif;">

    {{-- 1. BANNER ATAS --}}
    <div class="relative h-[300px] flex items-center justify-center bg-cover bg-center mb-12" 
         style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/Group 70.png') }}');"
         data-aos="fade-in">
        <h1 class="text-white text-4xl md:text-5xl font-black uppercase tracking-[5px]" data-aos="zoom-out" data-aos-delay="300">
            Berita Kami
        </h1>
    </div>

    {{-- 2. BERITA UTAMA --}}
    @if($beritas->count() > 0)
    @php $utama = $beritas->first(); @endphp
    <section class="py-12 bg-white">
        <div class="max-w-[1200px] mx-auto px-5 flex flex-col md:flex-row items-center gap-12">
            <div class="flex-1" data-aos="fade-right" data-aos-duration="1000">
                <img src="{{ asset('storage/berita/' . $utama->gambar) }}" 
                     class="w-full h-[400px] object-cover rounded-[40px] shadow-2xl hover:scale-105 transition duration-700" alt="Berita Utama">
            </div>
            <div class="flex-1" data-aos="fade-left" data-aos-duration="1000">
                <div class="w-12 h-1 bg-yellow-600 mb-6"></div>
                <h2 class="text-3xl font-black uppercase mb-6 leading-tight text-zinc-800">{{ $utama->judul }}</h2>
                <p class="text-gray-500 font-medium mb-8 leading-relaxed">
                    {{ Str::limit($utama->isi, 250) }}
                </p>
                <a href="{{ route('berita.detail', $utama->id) }}" 
                   class="inline-block bg-black text-white px-10 py-4 font-bold text-xs uppercase tracking-widest hover:bg-zinc-800 transition-all hover:shadow-xl">
                    Baca Selengkapnya
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- 3. BERITA LAINNYA --}}
    <section class="py-16 bg-[#fcfcfc] pb-24">
        <div class="max-w-[1200px] mx-auto px-5">
            <div class="flex items-center gap-4 mb-12" data-aos="fade-up">
                <h3 class="text-2xl font-black uppercase tracking-tighter">Berita Lainnya</h3>
                <div class="flex-1 h-[1px] bg-gray-200"></div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @forelse($beritas->skip(1) as $index => $item)
                <div class="bg-white rounded-[30px] overflow-hidden shadow-sm hover:shadow-2xl transition-all duration-500 flex flex-col group"
                     data-aos="fade-up" data-aos-delay="{{ ($index % 4) * 150 }}">
                    <div class="overflow-hidden h-48">
                        <img src="{{ asset('storage/berita/' . $item->gambar) }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500" alt="{{ $item->judul }}">
                    </div>
                    <div class="p-8 flex flex-col flex-1">
                        <h4 class="font-black uppercase text-md mb-3 text-zinc-800 line-clamp-2">{{ $item->judul }}</h4>
                        <p class="text-gray-400 text-xs mb-6 leading-relaxed flex-1">
                            {{ Str::limit($item->isi, 80) }}
                        </p>
                        <a href="{{ route('berita.detail', $item->id) }}" 
                           class="text-yellow-600 font-black text-[10px] uppercase tracking-widest border-b-2 border-yellow-600 pb-1 self-start hover:text-black hover:border-black transition-all">
                            Baca Selengkapnya
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-4 text-center py-20" data-aos="fade-in">
                    <p class="text-gray-400 font-bold uppercase tracking-widest text-sm">Belum ada berita lainnya.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

</div>

{{-- 4. FOOTER --}}
<footer class="bg-[#111111] text-white pt-20 pb-10 px-10 md:px-20">
    <div class="container mx-auto" data-aos="fade-in">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-16">
            <div>
                <h4 class="text-2xl font-bold mb-8">Tasty Food</h4>
                <p class="text-gray-400 text-sm leading-relaxed mb-8">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="opacity-50 hover:opacity-100 transition"><img src="{{ asset('images/001-facebook.png') }}" class="w-8"></a>
                    <a href="#" class="opacity-50 hover:opacity-100 transition"><img src="{{ asset('images/002-twitter.png') }}" class="w-8"></a>
                </div>
            </div>

            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-zinc-500 mb-8">Useful links</h4>
                <ul class="text-sm space-y-4 font-bold">
                    <li><a href="#" class="hover:text-zinc-400 transition">Blog</a></li>
                    <li><a href="#" class="hover:text-zinc-400 transition">Galeri</a></li>
                    <li><a href="#" class="hover:text-zinc-400 transition">Testimonial</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-zinc-500 mb-8">Privacy</h4>
                <ul class="text-sm space-y-4 font-bold">
                    <li><a href="#" class="hover:text-zinc-400 transition">Karir</a></li>
                    <li><a href="#" class="hover:text-zinc-400 transition">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-zinc-400 transition">Kontak Kami</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-zinc-500 mb-8">Contact Info</h4>
                <ul class="text-sm space-y-5">
                    <li class="flex items-center gap-3"><img src="{{ asset('images/Group 66.png') }}" class="w-5"> <span>tastyfood@gmail.com</span></li>
                    <li class="flex items-center gap-3"><img src="{{ asset('images/Group 67.png') }}" class="w-5"> <span>+62 812 3456 7890</span></li>
                    <li class="flex items-center gap-3"><img src="{{ asset('images/Group 68.png') }}" class="w-5"> <span>Bandung, Jawa Barat</span></li>
                </ul>
            </div>
        </div>

        <div class="text-center pt-10 border-t border-gray-800">
            <p class="text-gray-500 text-[10px] font-black uppercase tracking-widest">
                Copyright ©2026 All rights reserved
            </p>
        </div>
    </div>
</footer>
@endsection