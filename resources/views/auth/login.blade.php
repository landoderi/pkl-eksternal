@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8 bg-cover bg-center bg-no-repeat relative" 
     style="font-family: 'Montserrat', sans-serif; background-image: url('{{ asset('images/Group 70.png') }}');">
    
    <div class="absolute inset-0 bg-black/30 z-0"></div>

    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-[30px] shadow-xl border border-gray-100 relative z-10 animate-fade-in-up">
        <div>
            <h2 class="text-center text-3xl font-extrabold text-gray-900 uppercase tracking-widest">
                Tasty Food
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Silahkan login untuk mengakses dashboard
            </p>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm space-y-4">
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-500 mb-1 ml-1">Email Address</label>
                    <input name="email" type="email" required class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-black focus:border-black focus:z-10 sm:text-sm" placeholder="Email@example.com">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-500 mb-1 ml-1">Password</label>
                    <input name="password" type="password" required class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-black focus:border-black focus:z-10 sm:text-sm" placeholder="••••••••">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" class="h-4 w-4 text-black focus:ring-black border-gray-300 rounded">
                    <label class="ml-2 block text-sm text-gray-900">Ingat saya</label>
                </div>
                <div class="text-sm">
                    <a href="#" class="font-bold text-gray-600 hover:text-black">Lupa password?</a>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-xl text-white bg-black hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black uppercase tracking-widest transition-all">
                    Login
                </button>
            </div>
            <div class="mt-4">
    <a href="{{ route('google.login') }}" class="w-full flex items-center justify-center gap-3 py-3 px-4 border-2 border-gray-200 rounded-xl font-bold text-sm hover:bg-gray-50 transition-all">
        <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-5 h-5">
        Login dengan Google
    </a>
</div>
        </form>
        <p class="text-center text-sm text-gray-600">
            Belum punya akun? <a href="{{ route('register') }}" class="font-bold text-black border-b-2 border-black">Daftar sekarang</a>
        </p>
    </div>
</div>

{{-- Style Animasi (Tetap sama) --}}
<style>
    @keyframes fade-in-up {
        0% { opacity: 0; transform: translateY(20px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
    }
</style>
@endsection