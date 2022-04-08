<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketWisata extends Model
{
    use HasFactory;

    protected  $primaryKey = 'id';
    protected $table = 'paket_wisata';
    protected $fillable = [
        'nama_paket',
        'destinasi_wisata',
        'deskripsi',
        'photo_wisata',
        'harga'
    ];

    protected $casts = [
        'destinasi_wisata' => 'array',
        'photo_wisata' => 'array'
    ];
}
