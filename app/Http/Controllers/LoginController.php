<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite; // Tambah ini
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    // Fungsi untuk lempar ke Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Fungsi tangkap data dari Google
public function handleGoogleCallback()
{
    try {
        $userGoogle = Socialite::driver('google')->user();
        
        // Debugging: Cek apakah data dari Google masuk
        // dd($userGoogle); 

        $user = User::updateOrCreate([
            'email' => $userGoogle->getEmail(),
        ], [
            'name' => $userGoogle->getName(),
            'google_id' => $userGoogle->getId(),
            'password' => bcrypt(Str::random(24)), // Pakai bcrypt atau Hash::make
            'role' => 'member',
        ]);

        Auth::login($user);
        
        return redirect()->route($user->role == 'admin' ? 'admin.dashboard' : 'home');

    } catch (\Exception $e) {
        // Ini kuncinya! Biar kita tau kenapa gagal simpan
        return dd($e->getMessage()); 
    }
}
}