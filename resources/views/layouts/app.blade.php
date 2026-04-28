<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Food - Healthy Tasty Food</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Montserrat', sans-serif !important; }
    </style>
</head>
<body class="bg-white text-gray-800">

    {{-- 1. NAVBAR: Hanya muncul di halaman depan, BUKAN login/register/admin --}}
    @if(!Route::is('login') && !Route::is('register') && !Request::is('admin*'))
        @include('layouts.navbar')
    @endif

    <div class="flex">
        {{-- 2. SIDEBAR: Hanya muncul jika URL-nya ada kata 'admin' --}}
        @if(Request::is('admin*'))
            @include('layouts.sidebar_admin') {{-- Buat file ini di layouts/sidebar_admin.blade.php --}}
        @endif

        {{-- 3. CONTENT --}}
        <main class="flex-1 {{ Request::is('admin*') ? 'md:ml-64' : '' }}">
            @yield('content')
        </main>
    </div>

</body>
</html>