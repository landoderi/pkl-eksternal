<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    // Tambahkan baris ini
    protected $fillable = ['foto', 'judul']; 
}