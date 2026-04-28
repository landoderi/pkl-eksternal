@extends('layouts.app')

@section('content')
<div style="font-family: 'Montserrat', sans-serif;">

<div style="font-family: 'Arial', sans-serif; color: #333; background-color: #fff; margin: 0; padding: 0;">

    <div style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/Group 70.png') }}'); 
                background-size: cover; background-position: center; height: 300px; display: flex; 
                align-items: center; justify-content: center; margin-bottom: 50px;">
                
        <h1 style="color: white; font-size: 48px; text-transform: uppercase; font-weight: bold; letter-spacing: 5px;">
            Kontak Kami
        </h1>
        </div>
    </div>

<section class="py-20 bg-white">
    <div class="max-w-[1200px] mx-auto px-5">
        <h2 class="text-2xl font-extrabold uppercase mb-10">Kontak Kami</h2>
        
        @if(session('success'))
            <div id="alert-box" class="bg-green-500 text-white p-4 rounded-xl mb-6 transition-opacity duration-500">
                {{ session('success') }}
            </div>
        @endif

        {{-- CEK APAKAH USER SUDAH LOGIN --}}
        @auth
            {{-- Jika sudah login, tampilkan form seperti biasa --}}
            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="space-y-4">
                        <input type="text" name="subject" placeholder="Subject" class="w-full p-4 border border-gray-300 rounded-xl" required>
                        <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full p-4 border border-gray-300 rounded-xl bg-gray-100" readonly>
                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full p-4 border border-gray-300 rounded-xl bg-gray-100" readonly>
                    </div>
                    <div>
                        <textarea name="message" placeholder="Message" class="w-full h-full min-h-[200px] p-4 border border-gray-300 rounded-xl" required></textarea>
                    </div>
                </div>
                <button type="submit" class="w-full bg-black text-white font-bold py-4 rounded-xl uppercase tracking-widest hover:bg-gray-800 transition-all">
                    Kirim
                </button>
            </form>
        @else
            {{-- Jika BELUM login, tampilkan pesan peringatan dan tombol login --}}
            <div class="bg-gray-100 p-10 rounded-3xl text-center border-2 border-dashed border-gray-300">
                <div class="mb-4 flex justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Akses Terbatas</h3>
                <p class="text-gray-500 mb-6">Silahkan login terlebih dahulu untuk mengirimkan pesan kepada kami.</p>
                <a href="{{ route('login') }}" class="inline-block bg-black text-white px-10 py-4 rounded-xl font-bold uppercase tracking-widest hover:bg-gray-800 transition-all">
                    Login Sekarang
                </a>
            </div>
        @endauth
    </div>
</section>

    <section class="pb-20 bg-white">
        <div class="max-w-[1200px] mx-auto px-5 grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
            <div class="flex flex-col items-center">
                <div class="w-20 h-20 bg-black rounded-full flex items-center justify-center mb-4">
                    <img src="{{ asset('images/ic_markunread_24px@2x.png') }}"  alt="Email">
                </div>
                <h4 class="font-extrabold uppercase mb-2">Email</h4>
                <p class="text-gray-500 text-sm">tastyfood@gmail.com</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-20 h-20 bg-black rounded-full flex items-center justify-center mb-4">
                    <img src="{{ asset('images/ic_call_24px@2x.png') }}" alt="Phone">
                </div>
                <h4 class="font-extrabold uppercase mb-2">Phone</h4>
                <p class="text-gray-500 text-sm">+62 812 3456 7890</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-20 h-20 bg-black rounded-full flex items-center justify-center mb-4">
                    <img src="{{ asset('images/ic_place_24px@2x.png') }}" alt="Location">
                </div>
                <h4 class="font-extrabold uppercase mb-2">Location</h4>
                <p class="text-gray-500 text-sm">Jl. Terusan Mars Utara III No.8D, Manjahlega, Kec. Bandung Kidul, Kota Bandung, Jawa Barat 40267</p>
            </div>
        </div>
    </section>

    <section class="py-10 bg-gray-50">
        <div class="max-w-[1200px] mx-auto px-5">
            <div class="rounded-3xl overflow-hidden shadow-lg h-[400px]">
                <iframe 
                   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.558806840512!2d107.66141237499674!3d-6.943211393056864!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7c381e3c323%3A0x5f5160f6c9796e4b!2sCYBERLABS%20-%20Jasa%20Digital%20Marketing%20%7C%20Jasa%20Pembuatan%20Website%20%7C%20Jasa%20Pembuatan%20Aplikasi!5e0!3m2!1sid!2sid!4v1776752986679!5m2!1sid!2sid"
                    class="w-full h-full border-0" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
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
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cari box pesan sukses
        const successAlert = document.getElementById('alert-box');
        if (successAlert) {
            setTimeout(function() {
                successAlert.style.opacity = '0';
                setTimeout(function() {
                    successAlert.remove();
                }, 500); // Waktu transisi fade out
            }, 2000); // 2000ms = 2 Detik
        }

        // Cari box pesan error
        const errorAlert = document.getElementById('alert-box-error');
        if (errorAlert) {
            setTimeout(function() {
                errorAlert.style.opacity = '0';
                setTimeout(function() {
                    errorAlert.remove();
                }, 500);
            }, 2000);
        }
    });
</script>