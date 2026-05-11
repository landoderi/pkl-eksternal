@extends('layouts.app')

@section('content')
<div class="overflow-hidden">

    {{-- 1. HERO SECTION --}}
    <div class="relative h-[300px] flex items-center justify-center bg-cover bg-center mb-12" 
         style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/Group 70.png') }}');"
         data-aos="fade-in">
        <h1 class="text-white text-4xl md:text-5xl font-black uppercase tracking-[5px]" data-aos="zoom-out" data-aos-delay="300">
            Tentang Kami
        </h1>
    </div>


    <div class="max-w-[1100px] mx-auto px-6">
        
        {{-- 2. TASTY FOOD INTRO --}}
        <div class="flex flex-wrap mb-24 items-start gap-10">
            <div class="flex-1 min-w-[300px]" data-aos="fade-right">
                <h2 class="font-black text-3xl mb-6 uppercase tracking-tighter text-zinc-800">Tasty Food</h2>
                <p class="font-bold leading-relaxed mb-4 text-zinc-700">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, 
                    dui diam convallis arcu, eget consectetur ex sem eget locus.
                </p>
                <p class="line-height-relaxed text-gray-500">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, 
                    dui diam convallis arcu, eget consectetur ex sem eget locus. Nullam vitae dignissim neque, vel luctus ex. 
                    Fusce si amet viverra ante.
                </p>
            </div>
            <div class="flex-1 flex gap-4 min-w-[300px]" data-aos="fade-left">
                <img src="{{ asset('images/brooke-lark-oaz0raysASk-unsplash.jpg') }}" 
                     class="w-1/2 rounded-[30px] h-[400px] object-cover shadow-2xl hover:scale-105 transition duration-500" alt="Resto">
                <img src="{{ asset('images/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}" 
                     class="w-1/2 rounded-[30px] h-[400px] object-cover shadow-2xl mt-10 hover:scale-105 transition duration-500" alt="Chef">
            </div>
        </div>

        {{-- 3. VISI --}}
        <div class="flex flex-wrap gap-10 mb-20 items-center">
            <div class="flex-1 min-w-[300px] flex gap-4" data-aos="zoom-in-right">
                <img src="{{ asset('images/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" class="w-[48%] rounded-3xl h-56 object-cover shadow-lg" alt="Visi 1">
                <img src="{{ asset('images/michele-blackwell-rAyCBQTH7ws-unsplash.jpg') }}" class="w-[48%] rounded-3xl h-56 object-cover shadow-lg mt-6" alt="Visi 2">
            </div>
            <div class="flex-1 min-w-[300px]" data-aos="fade-left">
                <h2 class="font-black text-2xl mb-4 uppercase tracking-widest text-zinc-800">Visi</h2>
                <p class="leading-relaxed text-gray-500 text-lg">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. 
                    Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit.
                </p>
            </div>
        </div>

        {{-- 4. MISI --}}
        <div class="flex flex-wrap gap-10 mb-32 flex-row-reverse items-center">
            <div class="flex-1 min-w-[300px]" data-aos="zoom-in-left">
                <img src="{{ asset('images/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" 
                     class="w-full rounded-[40px] h-64 object-cover shadow-xl" alt="Misi">
            </div>
            <div class="flex-1 min-w-[300px]" data-aos="fade-right">
                <h2 class="font-black text-2xl mb-4 uppercase tracking-widest text-zinc-800">Misi</h2>
                <p class="leading-relaxed text-gray-500 text-lg">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. 
                    Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit.
                </p>
            </div>
        </div>

    </div>

    {{-- 5. FOOTER --}}
    <footer class="bg-[#111111] text-white pt-20 pb-10 px-10 md:px-20">
        <div class="container mx-auto" data-aos="fade-up">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-16">
                <div>
                    <h4 class="text-2xl font-bold mb-8">Tasty Food</h4>
                    <p class="text-gray-400 text-sm leading-relaxed mb-8">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    <div class="flex space-x-4">
                        <img src="{{ asset('images/001-facebook.png') }}" alt="Facebook" class="w-8 h-8 opacity-50 hover:opacity-100 transition">
                        <img src="{{ asset('images/002-twitter.png') }}" alt="Twitter" class="w-8 h-8 opacity-50 hover:opacity-100 transition">
                    </div>
                </div>

                <div>
                    <h4 class="text-xl font-bold mb-8 uppercase tracking-widest text-zinc-500 text-xs">Useful links</h4>
                    <ul class="text-white text-sm space-y-4 font-medium">
                        <li><a href="#" class="hover:text-zinc-400 transition">Blog</a></li>
                        <li><a href="#" class="hover:text-zinc-400 transition">Galeri</a></li>
                        <li><a href="#" class="hover:text-zinc-400 transition">Testimonial</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-xl font-bold mb-8 uppercase tracking-widest text-zinc-500 text-xs">Privacy</h4>
                    <ul class="text-white text-sm space-y-4 font-medium">
                        <li><a href="#" class="hover:text-zinc-400 transition">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-zinc-400 transition">Kontak Kami</a></li>
                        <li><a href="#" class="hover:text-zinc-400 transition">Servis</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-xl font-bold mb-8 uppercase tracking-widest text-zinc-500 text-xs">Contact Info</h4>
                    <ul class="text-white text-sm space-y-5">
                        <li class="flex items-center gap-3">
                            <img src="{{ asset('images/Group 66.png') }}" class="w-6"> <span>tastyfood@gmail.com</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <img src="{{ asset('images/Group 67.png') }}" class="w-6"> <span>+62 812 3456 7890</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <img src="{{ asset('images/Group 68.png') }}" class="w-6"> <span>Bandung, Jawa Barat</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-center pt-10 border-t border-gray-800">
                <p class="text-gray-500 text-[10px] font-bold uppercase tracking-widest">
                    Copyright ©2026 Tasty Food - SMK RPL Project
                </p>
            </div>
        </div>
    </footer>

</div>
@endsection