<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Tasty Food</title>
    
    {{-- Tailwind CSS --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;900&display=swap" rel="stylesheet">
    
    {{-- AOS (Animate On Scroll) CSS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body { font-family: 'Montserrat', sans-serif; }
        
        /* 1. Kustomisasi Background dengan Gradient Overlay */
        .bg-welcome {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.4)), 
                        url('{{ asset("images/brooke-lark-oaz0raysASk-unsplash.jpg") }}');
            background-size: cover;
            background-position: center;
        }

        /* 2. Animasi Kustom untuk Tombol Utama */
        .btn-primary {
            position: relative;
            overflow: hidden;
            transition: all 0.4s ease-in-out;
        }
        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.4s ease-in-out;
            z-index: 1;
        }
        .btn-primary:hover::before {
            left: 100%;
        }
    </style>
</head>
<body class="bg-welcome h-screen flex items-center justify-center text-white overflow-hidden">

    <div class="text-center px-6 relative z-10">
        {{-- Animasi: Fade Up, Delay 100ms --}}
{{-- Ganti bg-yellow-500 jadi bg-black --}}
<div class="w-20 h-1.5 bg-black mx-auto mb-10 rounded-full" 
     data-aos="fade-up" data-aos-delay="100"></div>

<h1 class="text-6xl md:text-8xl font-black uppercase tracking-tighter mb-5 leading-none" 
    data-aos="fade-up" data-aos-delay="300" data-aos-duration="800">
    Tasty <span class="text-black">Food</span> {{-- Ganti text-yellow-500 jadi text-black --}}
</h1>
        
        {{-- Animasi: Fade Up, Delay 500ms --}}
        <p class="text-lg md:text-xl font-light tracking-widest uppercase mb-16 opacity-80 max-w-2xl mx-auto" 
           data-aos="fade-up" data-aos-delay="500">
            Healthy & Delicious Culinary Experience
        </p>

        {{-- Animasi: Fade Up, Delay 700ms --}}
        <div class="flex flex-col md:flex-row gap-6 justify-center items-center" 
             data-aos="fade-up" data-aos-delay="700">
            
            {{-- Tombol dengan efek Shine (btn-primary) --}}
{{-- Ganti bg-yellow-500 jadi bg-black dan hover:bg-yellow-600 jadi hover:bg-gray-800 --}}
<a href="/home" class="btn-primary group relative px-16 py-4 bg-black text-white font-bold uppercase text-xs tracking-[0.2em] shadow-2xl hover:scale-105 hover:bg-gray-800 active:scale-95 transition-all">
    Explore Menu
</a>
            
@guest
    <a href="/login" class="px-12 py-4 border-2 border-white font-bold uppercase text-xs tracking-[0.2em] hover:bg-white hover:text-black transition-all">
        Login
    </a>
@else
    {{-- Cek apakah user yang login punya role 'admin' --}}
@if(auth()->user()->role == 'admin')
    {{-- Ganti border-yellow-500 dan text-yellow-500 jadi black --}}
    <a href="/admin/dashboard" class="px-12 py-4 border-2 border-black text-black font-bold uppercase text-xs tracking-[0.2em] hover:bg-black hover:text-white transition-all">
        Dashboard
    </a>
@endif
    
    {{-- Tombol Logout (Opsional, tapi bagus biar user bisa keluar) --}}
    <form action="{{ route('logout') }}" method="POST" class="inline">
        @csrf
        <button type="submit" class="px-12 py-4 border-2 border-red-500 text-red-500 font-bold uppercase text-xs tracking-[0.2em] hover:bg-red-500 hover:text-white transition-all">
            Logout
        </button>
    </form>
@endguest
        </div>
    </div>

    {{-- Footer dengan animasi Fade In setelah 1.2 detik --}}
    <div class="absolute bottom-8 w-full text-center opacity-40 text-[9px] uppercase tracking-[0.6em]" 
         data-aos="fade-in" data-aos-delay="1200">
        © 2026 SMK RPL Project - Tasty Food
    </div>

    {{-- AOS (Animate On Scroll) JS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi AOS dengan durasi global 1 detik
        AOS.init({
            duration: 1000, 
            once: true, // Animasi cuma jalan sekali pas halaman dimuat
        });
    </script>

</body>
</html>