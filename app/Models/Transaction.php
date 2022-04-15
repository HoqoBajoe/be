<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = 'transaksi';

    protected $fillable = [
        'id_user',
        'id_paket_wisata',
        'metode',
        'pax',
        'total',
        'status',
    ];
}
