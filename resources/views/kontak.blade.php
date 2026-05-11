@extends('layouts.app')

@section('content')
<div style="font-family: 'Montserrat', sans-serif;">

    {{-- 1. HERO SECTION DENGAN ANIMASI FADE --}}
    <div class="relative h-[300px] flex items-center justify-center bg-cover bg-center mb-12" 
         style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/Group 70.png') }}');"
         data-aos="fade-in">
        <h1 class="text-white text-4xl md:text-5xl font-black uppercase tracking-[5px]" data-aos="zoom-out" data-aos-delay="300">
            Kontak Kami
        </h1>
    </div>


    {{-- 2. FORM SECTION --}}
    <section class="py-20 bg-white overflow-hidden">
        <div class="max-w-[1200px] mx-auto px-5">
            <h2 class="text-2xl font-extrabold uppercase mb-10" data-aos="fade-right">Kontak Kami</h2>
            
            @if(session('success'))
                <div id="alert-box" class="bg-green-500 text-white p-4 rounded-xl mb-6 transition-opacity duration-500 shadow-lg">
                    {{ session('success') }}
                </div>
            @endif

            @auth
                <div data-aos="fade-up" data-aos-duration="1000">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div class="space-y-4">
                                <input type="text" name="subject" placeholder="Subject" class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-black outline-none transition-all" required>
                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full p-4 border border-gray-300 rounded-xl bg-gray-100" readonly>
                                <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full p-4 border border-gray-300 rounded-xl bg-gray-100" readonly>
                            </div>
                            <div>
                                <textarea name="message" placeholder="Message" class="w-full h-full min-h-[200px] p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-black outline-none transition-all" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-black text-white font-bold py-4 rounded-xl uppercase tracking-widest hover:bg-zinc-800 transition-all hover:scale-[1.01] active:scale-95 shadow-xl">
                            Kirim
                        </button>
                    </form>
                </div>
            @else
                <div class="bg-gray-100 p-10 rounded-3xl text-center border-2 border-dashed border-gray-300" data-aos="zoom-in">
                    <div class="mb-4 flex justify-center">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Akses Terbatas</h3>
                    <p class="text-gray-500 mb-6">Silahkan login terlebih dahulu untuk mengirimkan pesan kepada kami.</p>
                    <a href="{{ route('login') }}" class="inline-block bg-black text-white px-10 py-4 rounded-xl font-bold uppercase tracking-widest hover:bg-zinc-800 transition-all hover:scale-105 shadow-lg">
                        Login Sekarang
                    </a>
                </div>
            @endauth
        </div>
    </section>

    {{-- 3. INFO CARDS --}}
    <section class="pb-20 bg-white">
        <div class="max-w-[1200px] mx-auto px-5 grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
            {{-- Email Card --}}
            <div class="flex flex-col items-center group" data-aos="fade-up" data-aos-delay="100">
                <div class="w-20 h-20 bg-black rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 shadow-xl">
                    <img src="{{ asset('images/ic_markunread_24px@2x.png') }}" class="w-8 h-8 object-contain" alt="Email">
                </div>
                <h4 class="font-extrabold uppercase mb-2">Email</h4>
                <p class="text-gray-500 text-sm">tastyfood@gmail.com</p>
            </div>
            
            {{-- Phone Card --}}
            <div class="flex flex-col items-center group" data-aos="fade-up" data-aos-delay="300">
                <div class="w-20 h-20 bg-black rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 shadow-xl">
                    <img src="{{ asset('images/ic_call_24px@2x.png') }}" class="w-8 h-8 object-contain" alt="Phone">
                </div>
                <h4 class="font-extrabold uppercase mb-2">Phone</h4>
                <p class="text-gray-500 text-sm">+62 812 3456 7890</p>
            </div>
            
            {{-- Location Card --}}
            <div class="flex flex-col items-center group" data-aos="fade-up" data-aos-delay="500">
                <div class="w-20 h-20 bg-black rounded-full flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 shadow-xl">
                    <img src="{{ asset('images/ic_place_24px@2x.png') }}" class="w-8 h-8 object-contain" alt="Location">
                </div>
                <h4 class="font-extrabold uppercase mb-2">Location</h4>
                <p class="text-gray-500 text-sm px-4">Jl. Terusan Mars Utara III No.8D, Kota Bandung</p>
            </div>
        </div>
    </section>

{{-- 4. MAPS SECTION --}}
    <section class="py-10 bg-gray-50" data-aos="zoom-in-up" data-aos-duration="1200">
        <div class="max-w-[1200px] mx-auto px-5">
            <div class="rounded-3xl overflow-hidden shadow-2xl h-[400px] border-8 border-white">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.558805626248!2d107.6616423!3d-6.9432114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7df0786f91f%3A0xc3911f99c2b8c56c!2sJl.%20Terusan%20Mars%20Utara%20III%20No.8D%2C%20Manjahlega%2C%20Kec.%20Bandung%20Kidul%2C%20Kota%20Bandung%2C%20Jawa%20Barat%2040267!5e0!3m2!1sid!2sid!4v1714550000000!5m2!1sid!2sid"
                    class="w-full h-full border-0" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
    </section>

</div> {{-- Penutup font-family Montserrat --}}

{{-- FOOTER TERBARU WOK --}}
<footer class="bg-[#111111] text-white pt-20 pb-10 px-10 md:px-20">
    <div class="container mx-auto" data-aos="fade-up">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-16">
            <div>
                <h4 class="text-2xl font-bold mb-8">Tasty Food</h4>
                <p class="text-gray-400 text-sm leading-relaxed mb-8">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="hover:brightness-125 transition">
                        <img src="{{ asset('images/001-facebook.png') }}" class="w-8" alt="Facebook">
                    </a>
                    <a href="#" class="hover:brightness-125 transition">
                        <img src="{{ asset('images/002-twitter.png') }}" class="w-8" alt="Twitter">
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-zinc-500 mb-8">Useful links</h4>
                <ul class="text-sm space-y-4 font-bold">
                    <li><a href="{{ route('home') }}" class="hover:text-zinc-400 transition">Home</a></li>
                    <li><a href="{{ route('galeri') }}" class="hover:text-zinc-400 transition">Galeri</a></li>
                    <li><a href="{{ route('berita') }}" class="hover:text-zinc-400 transition">Berita</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-zinc-500 mb-8">Privacy</h4>
                <ul class="text-sm space-y-4 font-bold">
                    <li><a href="{{ route('about') }}" class="hover:text-zinc-400 transition">Tentang Kami</a></li>
                    <li><a href="{{ route('kontak') }}" class="hover:text-zinc-400 transition">Kontak Kami</a></li>
                    <li><a href="#" class="hover:text-zinc-400 transition">Servis</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-black uppercase tracking-widest text-zinc-500 mb-8">Contact Info</h4>
                <ul class="text-sm space-y-5">
                    <li class="flex items-center gap-3">
                        <img src="{{ asset('images/Group 66.png') }}" class="w-5" alt="Email"> 
                        <span>tastyfood@gmail.com</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <img src="{{ asset('images/Group 67.png') }}" class="w-5" alt="Phone"> 
                        <span>+62 812 3456 7890</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <img src="{{ asset('images/Group 68.png') }}" class="w-5" alt="Location"> 
                        <span>Bandung, Jawa Barat</span>
                    </li>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Script untuk menghilangkan Alert Box Otomatis
        const alerts = ['alert-box', 'alert-box-error'];
        alerts.forEach(id => {
            const alertEl = document.getElementById(id);
            if (alertEl) {
                setTimeout(() => {
                    alertEl.style.opacity = '0';
                    setTimeout(() => alertEl.remove(), 500);
                }, 2000);
            }
        });
    });
</script>