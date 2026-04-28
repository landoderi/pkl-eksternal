@extends('layouts.app')

@section('content')
<div style="font-family: 'Arial', sans-serif; color: #333; background-color: #fff; margin: 0; padding: 0;">

    <div style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/Group 70.png') }}'); 
                background-size: cover; background-position: center; height: 300px; display: flex; 
                align-items: center; justify-content: center; margin-bottom: 50px;">
                
        <h1 style="color: white; font-size: 48px; text-transform: uppercase; font-weight: bold; letter-spacing: 5px;">
            Galeri Kami
        </h1>
        </div>
    </div>

    <section class="py-20">
        <div class="max-w-[1000px] mx-auto px-5 relative">
            <div class="rounded-[40px] overflow-hidden shadow-2xl relative">
                <img src="{{ asset('images/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}" class="w-full h-[500px] object-cover">
                <button class="absolute left-5 top-1/2 -translate-y-1/2 bg-white w-10 h-10 rounded-full flex items-center justify-center shadow-lg">❮</button>
                <button class="absolute right-5 top-1/2 -translate-y-1/2 bg-white w-10 h-10 rounded-full flex items-center justify-center shadow-lg">❯</button>
            </div>
        </div>
    </section>

{{-- Ganti bagian @php array tadi dengan ini --}}
<section class="pb-32">
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @foreach($galeris as $g)
        <div class="rounded-3xl overflow-hidden shadow-md h-80"> {{-- Bungkus pakai div dengan tinggi tetap --}}
            <img src="{{ asset('storage/galeri/' . $g->foto) }}" 
                 class="w-full h-full object-cover hover:scale-110 transition duration-500">
        </div>
    @endforeach
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
@endsection