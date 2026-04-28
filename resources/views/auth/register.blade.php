@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8" style="font-family: 'Montserrat', sans-serif; background-image: url('{{ asset('images/Group 70.png') }}'); background-size: cover;">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-[30px] shadow-xl border border-gray-100">
        <div>
            <h2 class="text-center text-3xl font-extrabold text-gray-900 uppercase tracking-widest">Join Tasty Food</h2>
            <p class="mt-2 text-center text-sm text-gray-600">Buat akun untuk mulai memesan</p>
        </div>

        <form class="mt-8 space-y-4" action="{{ route('register') }}" method="POST">
            @csrf
            
            {{-- Input Nama --}}
            <div>
                <label class="block text-xs font-bold uppercase text-gray-500 mb-1 ml-1">Nama Lengkap</label>
                <input name="name" type="text" value="{{ old('name') }}" required 
                       class="appearance-none rounded-xl relative block w-full px-4 py-3 border @error('name') border-red-500 @else border-gray-300 @enderror placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-black focus:border-black sm:text-sm" placeholder="Nama Anda">
                @error('name') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
            </div>

            {{-- Input Email --}}
            <div>
                <label class="block text-xs font-bold uppercase text-gray-500 mb-1 ml-1">Email Address</label>
                <input name="email" type="email" value="{{ old('email') }}" required 
                       class="appearance-none rounded-xl relative block w-full px-4 py-3 border @error('email') border-red-500 @else border-gray-300 @enderror placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-black focus:border-black sm:text-sm" placeholder="Email@example.com">
                @error('email') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
            </div>

            {{-- Input Password & Konfirmasi --}}
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-500 mb-1 ml-1">Password</label>
                    <input name="password" type="password" required 
                           class="appearance-none rounded-xl relative block w-full px-4 py-3 border @error('password') border-red-500 @else border-gray-300 @enderror placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-black focus:border-black sm:text-sm" placeholder="••••••••">
                    @error('password') <p class="text-red-500 text-[10px] mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-gray-500 mb-1 ml-1">Konfirmasi</label>
                    <input name="password_confirmation" type="password" required 
                           class="appearance-none rounded-xl relative block w-full px-4 py-3 border border-gray-300 placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-black focus:border-black sm:text-sm" placeholder="••••••••">
                </div>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full py-3 px-4 text-sm font-bold rounded-xl text-white bg-black hover:bg-gray-800 uppercase tracking-widest transition-all">
                    Daftar Akun
                </button>
            </div>
        </form>

        <p class="text-center text-sm text-gray-600">
            Sudah punya akun? <a href="{{ route('login') }}" class="font-bold text-black border-b-2 border-black">Login di sini</a>
        </p>
    </div>
</div>
@endsection