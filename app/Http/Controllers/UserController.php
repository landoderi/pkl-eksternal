<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Pastikan kamu punya file resources/views/home.blade.php
        // Atau ganti ke view yang ingin kamu tampilkan untuk member
        return view('home'); 
    }
}