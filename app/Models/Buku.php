<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul', 'pengarang', 'penerbit', 'image', 'tanggal_terbit', 'deskripsi'
    ];
}