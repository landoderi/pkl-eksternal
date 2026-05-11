{{-- 1. DESKTOP SIDEBAR (Hanya muncul di md ke atas) --}}
<aside class="hidden md:flex w-64 bg-black text-white p-6 flex-col min-h-screen shrink-0 sticky top-0" style="font-family: 'Montserrat', sans-serif;">
    <h2 class="text-2xl font-bold mb-10 tracking-widest uppercase text-center border-b border-gray-800 pb-4">
        Admin Panel
    </h2>
    <nav class="space-y-4 flex-grow">
        @php
            $navItems = [
                ['route' => 'admin.dashboard', 'label' => 'Dashboard'],
                ['route' => 'admin.berita', 'label' => 'Berita'],
                ['route' => 'admin.galeri', 'label' => 'Galeri'],
                ['route' => 'admin.kontak', 'label' => 'Kontak'],
            ];
        @endphp

        @foreach($navItems as $item)
            <a href="{{ route($item['route']) }}" 
               class="block py-2.5 px-4 rounded transition {{ request()->routeIs($item['route']) ? 'bg-zinc-800 border-l-4 border-white' : 'hover:bg-zinc-800' }}">
                {{ $item['label'] }}
            </a>
        @endforeach
        
        {{-- Tombol Home di PC --}}

    </nav>

    <div class="pt-10 border-t border-gray-800">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-400 font-bold uppercase text-xs tracking-widest hover:text-red-300 transition">
                Logout
            </button>
        </form>
    </div>
</aside>

{{-- 2. MOBILE BOTTOM NAVIGATION (Hanya muncul di mobile) --}}
<div class="md:hidden fixed bottom-0 left-0 w-full bg-white border-t border-zinc-200 px-6 py-3 z-[100] flex justify-between items-center shadow-[0_-10px_20px_rgba(0,0,0,0.05)] rounded-t-[30px]">
    
    {{-- Tombol Home di Mobile (Paling Kiri) --}}
    <a href="{{ route('home') }}" class="flex flex-col items-center gap-1 group">
        <div class="w-10 h-10 flex items-center justify-center rounded-2xl bg-zinc-100 text-zinc-800 transition-all duration-300">
            <span class="text-[10px] font-black italic">H</span>
        </div>
        <span class="text-[8px] font-black uppercase tracking-widest text-zinc-800">Home</span>
    </a>

    @foreach($navItems as $item)
        <a href="{{ route($item['route']) }}" class="flex flex-col items-center gap-1 group">
            <div class="w-10 h-10 flex items-center justify-center rounded-2xl transition-all duration-300 {{ request()->routeIs($item['route']) ? 'bg-black text-white' : 'bg-zinc-100 text-zinc-400' }}">
                <span class="text-[10px] font-black uppercase tracking-tighter">{{ substr($item['label'], 0, 2) }}</span>
            </div>
            <span class="text-[8px] font-black uppercase tracking-widest {{ request()->routeIs($item['route']) ? 'text-black' : 'text-zinc-400' }}">
                {{ $item['label'] }}
            </span>
        </a>
    @endforeach

    {{-- Tombol Logout Mobile --}}
    <form action="{{ route('logout') }}" method="POST" class="flex flex-col items-center gap-1">
        @csrf
        <button type="submit" class="w-10 h-10 bg-red-50 text-red-600 flex items-center justify-center rounded-2xl">
            <span class="text-[10px] font-black">X</span>
        </button>
        <span class="text-[8px] font-black uppercase tracking-widest text-red-600">Out</span>
    </form>
</div>

{{-- Spacer Mobile --}}
<div class="md:hidden h-20"></div>