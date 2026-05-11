<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Food - Healthy Tasty Food</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body { 
            font-family: 'Montserrat', sans-serif !important; 
            overflow-x: hidden; 
        }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-white text-gray-800">

    {{-- NAVBAR USER --}}
    @if(!Route::is('login') && !Route::is('register') && !Request::is('admin*'))
        @include('layouts.navbar')
    @endif

    {{-- WRAPPER UTAMA --}}
    <div class="{{ Request::is('admin*') ? 'flex min-h-screen' : '' }}">
        
        {{-- SIDEBAR ADMIN (Hanya 1 kali panggil) --}}
        @if(Request::is('admin*'))
            @include('layouts.sidebar_admin') 
        @endif

        {{-- AREA KONTEN UTAMA (Hanya 1 kali panggil) --}}
        <main class="flex-1 min-w-0">
            @yield('content')
        </main>

    </div> {{-- Penutup Wrapper Utama --}}

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init({
        once: true, 
        duration: 1000,
        easing: 'ease-out-back',
      });
    </script>
</body>
</html>