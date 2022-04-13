<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Review::create([
            'id_user' => 3,
            'id_paket_wisata' => 1,
            'stars' => 5,
            'review' => 'Ini nih, healing banget di Bajo. Terutama di 3 tempat ini, disamping itu Travel yang gak pernah ngecewain. Top Markotop deh!'
        ]);
    }
}
