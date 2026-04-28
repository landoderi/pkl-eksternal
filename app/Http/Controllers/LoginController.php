<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected function authenticated(Request $request, $user)
{
    if ($user->role == 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect('/home'); // Ke halaman Tasty Food kamu
}
}
