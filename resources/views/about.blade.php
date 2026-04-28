@extends('layouts.app')

@section('content')

<div style="font-family: 'Arial', sans-serif; color: #333; background-color: #fff; margin: 0; padding: 0;">

    <div style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/Group 70.png') }}'); 
                background-size: cover; background-position: center; height: 300px; display: flex; 
                align-items: center; justify-content: center; margin-bottom: 50px;">
                
        <h1 style="color: white; font-size: 48px; text-transform: uppercase; font-weight: bold; letter-spacing: 5px;">
            Tentang Kami
        </h1>
    </div>

    <div style="max-width: 1100px; margin: 0 auto; padding: 0 20px;">
        
        <div style="display: flex; flex-wrap: wrap; margin-bottom: 80px; align-items: flex-start;">
            <div style="flex: 1; min-width: 300px; padding-right: 40px;">
                <h2 style="font-weight: bold; font-size: 28px; margin-bottom: 20px; text-transform: uppercase;">Tasty Food</h2>
                <p style="font-weight: bold; line-height: 1.6; margin-bottom: 15px;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, 
                    dui diam convallis arcu, eget consectetur ex sem eget locus.
                </p>
                <p style="line-height: 1.6; color: #666;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, 
                    dui diam convallis arcu, eget consectetur ex sem eget locus. Nullam vitae dignissim neque, vel luctus ex. 
                    Fusce si amet viverra ante.
                </p>
            </div>
            <div style="flex: 1; display: flex; gap: 15px; min-width: 300px;">
                <img src="{{ asset('images/brooke-lark-oaz0raysASk-unsplash.jpg') }}" style="width: 50%; border-radius: 15px; object-fit: cover; height: 350px;" alt="Resto">
                <img src="{{ asset('images/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}" style="width: 50%; border-radius: 15px; object-fit: cover; height: 350px;" alt="Chef">
            </div>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 30px; margin-bottom: 50px;">
            
            <div style="flex: 1; min-width: 300px; display: flex; gap: 15px; align-items: center;">
                <img src="{{ asset('images/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" style="width: 45%; border-radius: 15px; height: 200px; object-fit: cover;" alt="Visi 1">
                <img src="{{ asset('images/michele-blackwell-rAyCBQTH7ws-unsplash.jpg') }}" style="width: 45%; border-radius: 15px; height: 200px; object-fit: cover;" alt="Visi 2">
            </div>
            
            <div style="flex: 1; min-width: 300px;">
                <h2 style="font-weight: bold; font-size: 24px; margin-bottom: 15px; text-transform: uppercase;">Visi</h2>
                <p style="line-height: 1.6; color: #666;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. 
                    Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit.
                </p>
            </div>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 30px; margin-bottom: 80px; flex-direction: row-reverse;">
            <div style="flex: 1; min-width: 300px;">
                <img src="{{ asset('images/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" style="width: 100%; border-radius: 15px; height: 250px; object-fit: cover;" alt="Misi">
            </div>
            
            <div style="flex: 1; min-width: 300px;">
                <h2 style="font-weight: bold; font-size: 24px; margin-bottom: 15px; text-transform: uppercase;">Misi</h2>
                <p style="line-height: 1.6; color: #666;">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. 
                    Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit.
                </p>
            </div>
        </div>

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

</div>
@endsection