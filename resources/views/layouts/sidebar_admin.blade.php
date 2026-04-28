<div class="w-64 bg-black text-white p-6 hidden md:flex flex-col fixed h-full" style="font-family: 'Montserrat', sans-serif;">
    <h2 class="text-2xl font-bold mb-10 tracking-widest uppercase text-center border-b border-gray-800 pb-4">
        Admin Panel
    </h2>
    <nav class="space-y-4 flex-grow">
        <a href="{{ route('admin.dashboard') }}" class="block py-2.5 px-4 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800' : 'hover:bg-gray-800' }} transition">
            Dashboard
        </a>
        <a href="{{ route('admin.berita') }}" class="block py-2.5 px-4 rounded hover:bg-gray-800 transition">
            Berita
        </a>
        <a href="{{ route('admin.galeri') }}" class="block py-2.5 px-4 rounded {{ request()->routeIs('admin.galeri') ? 'bg-gray-800' : 'hover:bg-gray-800' }} transition">
            Galeri
        </a>
        <a href="{{ route('admin.kontak') }}" class="block py-2.5 px-4 rounded hover:bg-gray-800 transition">
            Kontak
        </a>
    </nav>

    <div class="pt-10 border-t border-gray-800">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="text-red-400 font-bold uppercase text-xs tracking-widest hover:text-red-300">
                Logout
            </button>
        </form>
        <a href="{{ url('home') }}" class="block mt-4 text-gray-400 font-bold uppercase text-xs tracking-widest hover:text-white transition">
            ← Kembali Ke Home
        </a>
    </div>
</div>