<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    // protected  $primaryKey = 'id';
    protected $table = 'review';
    protected $fillable = [
        'id_user',
        'id_paket_wisata',
        'stars',
        'review',
        'status'
    ];
}
