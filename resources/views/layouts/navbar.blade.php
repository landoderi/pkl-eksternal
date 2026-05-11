@php
    $isBeritaDetail = Request::is('berita/*'); 
    $isBeritaIndex = Request::is('berita');    
    $isDarkBg = Request::is('about') || Request::is('galeri*') || Request::is('kontak') || $isBeritaIndex; 

    $textColor = ($isDarkBg && !$isBeritaDetail) ? 'text-white' : 'text-black';
    $borderColor = ($isDarkBg && !$isBeritaDetail) ? 'border-white' : 'border-black';
@endphp

@unless(Request::is('admin*'))
<nav class="absolute top-0 left-0 w-full z-[1000] py-6 md:py-10 font-['Montserrat']" x-data="{ openMobile: false }">
    <div class="max-w-[1200px] mx-auto flex justify-between items-center px-6 md:px-12">
        
        {{-- LOGO --}}
        <div class="text-xl md:text-2xl font-black uppercase tracking-widest {{ $textColor }} z-[1001]">
            Tasty Food
        </div>

        {{-- HAMBURGER BUTTON --}}
        <button @click="openMobile = true" class="md:hidden p-2 {{ $textColor }} focus:outline-none z-[1001]">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>

        {{-- DESKTOP MENU (Normal) --}}
{{-- DESKTOP MENU (DENGAN ANIMASI TRANSISI) --}}
<div class="hidden md:flex items-center gap-10">
    @php $menus = ['Home' => '/home', 'Tentang' => '/about', 'Berita' => '/berita', 'Galeri' => '/galeri', 'Kontak' => '/kontak']; @endphp
    @foreach($menus as $name => $url)
        <a href="{{ $url }}" class="{{ $textColor }} font-extrabold uppercase text-[11px] tracking-widest hover:opacity-70 transition">{{ $name }}</a>
    @endforeach

    @auth
        {{-- Profile Dropdown buat PC --}}
        <div x-data="{ openProfile: false }" class="relative">
            <button @click="openProfile = !openProfile" 
                    class="w-9 h-9 bg-black text-white rounded-full flex items-center justify-center font-black text-sm focus:outline-none hover:scale-110 active:scale-95 transition-transform duration-200">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </button>

            {{-- Dropdown Menu PC dengan Animasi --}}
            <div x-show="openProfile" 
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                 x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                 @click.away="openProfile = false"
                 x-cloak
                 class="absolute right-0 mt-3 w-48 bg-white rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.1)] border border-zinc-100 py-2 z-[1100] overflow-hidden">
                
                @if(Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-5 py-3 text-[10px] font-bold text-black uppercase tracking-widest hover:bg-zinc-50 transition-colors">
                        <span class="mr-2 group-hover:translate-x-1 transition-transform">→</span> Ke Dashboard
                    </a>
                    <hr class="border-zinc-100 my-1">
                @endif

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left px-5 py-3 text-[10px] font-bold text-red-600 uppercase tracking-widest hover:bg-red-50 transition-colors">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    @else
        <a href="{{ route('login') }}" class="{{ $textColor }} {{ $borderColor }} font-black uppercase text-[11px] border-2 px-8 py-2.5 rounded-lg hover:bg-black hover:text-white transition-all duration-300">Login</a>
    @endauth
</div>
    </div>

{{-- MOBILE MENU (FLOATING BOTTOM VERSION) --}}
<div x-show="openMobile" 
     x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 translate-y-10"
     x-transition:enter-end="opacity-100 translate-y-0"
     x-transition:leave="transition ease-in duration-200"
     x-transition:leave-start="opacity-100 translate-y-0"
     x-transition:leave-end="opacity-0 translate-y-10"
     x-cloak
     @click.away="openMobile = false"
     {{-- Pindah ke Bottom Center --}}
     class="md:hidden fixed bottom-6 left-1/2 -translate-x-1/2 w-[90%] bg-white rounded-[35px] shadow-[0_25px_60px_rgba(0,0,0,0.2)] z-[2000] border border-zinc-100 p-6 overflow-hidden">
    
    {{-- List Menu Horizontal/Grid --}}
    <div class="grid grid-cols-3 gap-y-6 gap-x-2 mb-6 text-center">
        @foreach($menus as $name => $url)
            <a href="{{ $url }}" 
               class="text-black font-black uppercase text-[9px] tracking-[1px] flex flex-col items-center gap-2" 
               @click="openMobile = false">
                <div class="w-10 h-10 bg-zinc-50 rounded-2xl flex items-center justify-center border border-zinc-100">
                    <span class="text-[10px]">{{ substr($name, 0, 1) }}</span>
                </div>
                {{ $name }}
            </a>
        @endforeach
    </div>

    <div class="pt-5 border-t border-zinc-100">
        @auth
            <div class="flex items-center justify-between gap-4">
                {{-- Info User Ringkas --}}
                <div class="flex items-center gap-3 bg-zinc-50 p-2 pr-4 rounded-2xl border border-zinc-100">
                    <div class="w-8 h-8 bg-black text-white rounded-full flex items-center justify-center font-black text-xs">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <span class="text-[9px] font-bold text-black uppercase tracking-widest">
                        {{ explode(' ', Auth::user()->name)[0] }}
                    </span>
                </div>

                <div class="flex gap-2 flex-1">
                    @if(Auth::user()->role == 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="flex-1 bg-zinc-900 text-white py-3 rounded-2xl font-bold uppercase text-[9px] tracking-widest text-center shadow-lg active:scale-95 transition">
                        ADMIN
                    </a>
                    @endif
                    
                    <form action="{{ route('logout') }}" method="POST" class="{{ Auth::user()->role == 'admin' ? 'w-14' : 'flex-1' }}">
                        @csrf
                        <button type="submit" class="w-full bg-red-600 text-white py-3 rounded-2xl font-bold uppercase text-[9px] flex items-center justify-center shadow-md active:scale-95 transition">
                            @if(Auth::user()->role == 'admin')
                                <span class="text-xs">✕</span>
                            @else
                                LOGOUT
                            @endif
                        </button>
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}" class="block w-full bg-black text-white py-4 rounded-2xl font-black uppercase text-[10px] tracking-[3px] text-center shadow-xl active:scale-95 transition">
                LOGIN
            </a>
        @endauth
    </div>
</div>
</nav>
@endunless