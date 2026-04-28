<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    // Tentukan kolom yang bisa diisi manual (Mass Assignment)
    protected $fillable = ['judul', 'isi', 'gambar'];
}