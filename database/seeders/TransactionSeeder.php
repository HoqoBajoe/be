<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Transaction::create([
            'id_user' => 3,
            'id_paket_wisata' => 1,
            'metode' => 'Virtual Account BNI',
            'pax' => 3,
            'total' => 100000,
            'status' => 'Accepted'
        ]);
        Transaction::create([
            'id_user' => 3,
            'id_paket_wisata' => 2,
            'metode' => 'Virtual Account BRI',
            'pax' => 2,
            'total' => 100000,
            'status' => 'Pending'
        ]);
    }
}
