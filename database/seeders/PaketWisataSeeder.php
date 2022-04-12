<?php

namespace Database\Seeders;

use App\Models\PaketWisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PaketWisata::create([
            "nama_paket" => "Paket Hemat",
            "destinasi_wisata" => [
                "Ubud",
                "Kuta",
                "Nusa Penida"
            ],
            "deskripsi" => "Liburan yang sangat mengasyikan",
            "photo_wisata" => [
                "Photo 1",
                "Photo 2",
                "Photo 3"
            ],
            "harga" => 500000
        ]);
        PaketWisata::create([
            "nama_paket" => "Paket Hemat 2",
            "destinasi_wisata" => [
                "Kintamani",
                "Jimbaran",
                "Tanah Lot"
            ],
            "deskripsi" => "Liburan yang sangat mengasyikan sekali dan amat",
            "photo_wisata" => [
                "Photo 1",
                "Photo 2",
                "Photo 3"
            ],
            "harga" => 300000
        ]);
    }
}
