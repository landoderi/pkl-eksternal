@php
    // PERBAIKAN: Halaman '/' dan 'home' biasanya background terang, jadi teks harus HITAM (#000000)
    // Halaman lain seperti 'about' atau 'galeri' yang punya hero image gelap, baru pake PUTIH (#ffffff)
    $isDarkBg = Request::is('about') || Request::is('berita*') || Request::is('galeri*') || Request::is('kontak'); 
    $textColor = $isDarkBg ? '#ffffff' : '#000000';
@endphp

<style>
    .profile-dropdown { position: relative; display: inline-block; }
    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px rgba(0,0,0,0.1);
        border-radius: 8px;
        z-index: 1001;
        overflow: hidden;
    }
    .dropdown-content a, .dropdown-content button {
        color: black !important;
        padding: 12px 16px;
        display: block;
        font-size: 14px;
        font-weight: 600;
        text-align: left;
        width: 100%;
        border: none;
        background: none;
        cursor: pointer;
        text-decoration: none;
    }
    .dropdown-content a:hover, .dropdown-content button:hover { background-color: #f1f1f1; }
    .profile-dropdown:hover .dropdown-content { display: block; }
</style>

@unless(Request::is('admin*'))
<nav style="position: absolute; top: 0; left: 0; width: 100%; z-index: 1000; padding: 40px 0; font-family: 'Montserrat', sans-serif;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; padding: 0 50px;">
        
        <div style="font-size: 24px; font-weight: 800; color: {{ $textColor }}; text-transform: uppercase; letter-spacing: 2px;">
            Tasty Food
        </div>

        <ul style="list-style: none; display: flex; gap: 40px; margin: 0; padding: 0; align-items: center;">
@php
    $menus = ['Home' => '/home', 'Tentang' => '/about', 'Berita' => '/berita', 'Galeri' => '/galeri', 'Kontak' => '/kontak'];

    // LOGIKA:
    // 1. Halaman About, Galeri, Kontak, dan DAFTAR Berita Utama -> Putih (Dark Bg)
    // 2. Halaman Berita DETAIL (berita/{id}) -> Hitam (Light Bg)
    
    $isBeritaDetail = Request::is('berita/*'); // Cek apakah ini halaman detail (ada slash setelah berita)
    $isBeritaIndex = Request::is('berita');    // Cek apakah ini halaman daftar berita utama
    
    $isDarkBg = Request::is('about') || 
                Request::is('galeri*') || 
                Request::is('kontak') || 
                $isBeritaIndex; // Hanya index berita yang masuk kategori background gelap
    
    // Warna Teks: Putih jika di DarkBg, Hitam jika bukan (termasuk detail berita)
    $textColor = ($isDarkBg && !$isBeritaDetail) ? '#ffffff' : '#000000';
@endphp

            @foreach($menus as $name => $url)
                <li>
                    <a href="{{ $url }}" style="text-decoration: none; color: {{ $textColor }}; font-weight: 700; text-transform: uppercase; font-size: 12px; letter-spacing: 1.5px;">
                        {{ $name }}
                    </a>
                </li>
            @endforeach
                
            @auth
                <li class="profile-dropdown">
                    <div style="width: 35px; height: 35px; background-color: {{ $textColor }}; color: {{ $isDarkBg ? '#000000' : '#ffffff' }}; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 800; cursor: pointer; font-size: 14px;">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div class="dropdown-content">
                        <div style="padding: 12px 16px; border-bottom: 1px solid #eee; font-size: 11px; color: #888; text-transform: uppercase; font-weight: 700;">
                           Halo, {{ Auth::user()->name }}!
                        </div>
                        
                        @if(Auth::user()->role == 'admin')
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        @endif
                        
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" style="text-decoration: none; color: {{ $textColor }}; font-weight: 800; text-transform: uppercase; font-size: 12px; border: 2px solid {{ $textColor }}; padding: 10px 25px; border-radius: 5px; transition: 0.3s hover;">
                        Login
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
@endunless