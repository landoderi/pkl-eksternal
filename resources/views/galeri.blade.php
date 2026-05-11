@extends('layouts.app')

@section('content')
<div class="overflow-hidden" style="font-family: 'Montserrat', sans-serif;">

    {{-- 1. BANNER ATAS --}}
    <div class="relative h-[300px] flex items-center justify-center bg-cover bg-center mb-12" 
         style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/Group 70.png') }}');"
         data-aos="fade-in">
        <h1 class="text-white text-4xl md:text-5xl font-black uppercase tracking-[5px]" data-aos="zoom-out" data-aos-delay="200">
            Galeri Kami
        </h1>
    </div>

    {{-- 2. CAROUSEL / SLIDER UTAMA --}}
    <section class="py-12">
        <div class="max-w-[1000px] mx-auto px-5" data-aos="fade-up" data-aos-duration="1000">
            <div class="rounded-[40px] overflow-hidden shadow-2xl relative group">
                <img src="{{ asset('images/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}" 
                     class="w-full h-[500px] object-cover hover:scale-105 transition duration-1000">
                
                {{-- Button Navigation --}}
                <button class="absolute left-5 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg transition-all opacity-0 group-hover:opacity-100">
                    <span class="text-xl font-bold">❮</span>
                </button>
                <button class="absolute right-5 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg transition-all opacity-0 group-hover:opacity-100">
                    <span class="text-xl font-bold">❯</span>
                </button>
            </div>
        </div>
    </section>

{{-- 3. GRID GALERI --}}
    <section class="py-16 pb-32">
        <div class="max-w-[1200px] mx-auto px-4 md:px-5">
            {{-- Tambahkan grid-cols-2 untuk mobile --}}
            <div class="grid grid-cols-2 md:grid-cols-3 gap-3 md:gap-8">
                @foreach($galeries as $index => $g)
                    <div class="group relative rounded-[20px] md:rounded-[30px] overflow-hidden shadow-md h-48 md:h-80 bg-zinc-100" 
                         data-aos="zoom-in-up" 
                         data-aos-delay="{{ ($index % 3) * 150 }}">
                        
                        {{-- Pastikan path folder storage sudah benar --}}
                        {{-- Di file galeri.blade.php (tampilan user) --}}
<img src="{{ asset('storage/galeri/' . $g->foto) }}" 
     class="w-full h-full object-cover group-hover:scale-110 transition duration-700 ease-in-out"
     alt="Koleksi Tasty Food">
                        
                        {{-- Overlay --}}
                        <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                            <div class="w-10 h-10 md:w-12 md:h-12 border-2 border-white rounded-full flex items-center justify-center text-white font-bold">
                                +
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</div>

{{-- 4. FOOTER --}}
<footer class="bg-[#111111] text-white pt-20 pb-10 px-10 md:px-20">
    <div class="container mx-auto" data-aos="fade-up">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-16">
            <div>
                <h4 class="text-2xl font-bold mb-8">Tasty Food</h4>
                <p class="text-gray-400 text-sm leading-relaxed mb-8">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="hover:brightness-125 transition"><img src="{{ asset('images/001-facebook.png') }}" class="w-8"></a>
                    <a href="#" class="hover:brightness-125 transition"><img src="{{ asset('images/002-twitter.png') }}" class="w-8"></a>
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
                    <li><a href="#" class="hover:text-zinc-400 transition">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-zinc-400 transition">Kontak Kami</a></li>
                    <li><a href="#" class="hover:text-zinc-400 transition">Servis</a></li>
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
                Copyright ©2026 Tasty Food - SMK RPL Project
            </p>
        </div>
    </div>
</footer>
@endsection