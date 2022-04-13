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
            "nama_paket" => "Paket Bajoe Banget!",
            "destinasi_wisata" => [
                "Pulau Padar",
                "Wae Rebo",
                "Sawah Lingko"
            ],
            "deskripsi" => "Liburan yang sangat mengasyikan di 3 tempat ini, kalian bisa menikmati Pulau Padar yang merupakan “sepotong kecil surga yang bertebaran di bumi”, Wae Rebo Desa ini sangat terkenal, hampir eksotis. Bukan hanya karena letak dan bentuk rumah adat di daerah itu, tetapi juga karena segala sesuatu yang berhubungan dengan desa Wae Rebo. Dan yang terakhir ada di Tidak ada tempat lain di dunia di mana Anda dapat menemukan sawah yang terlihat seperti sarang laba-laba kecuali Desa Cangar di Kabupaten Manggarai.Petak sawah melingkar ini dibuat khusus untuk tujuan ini, sesuai dengan pola pengelolaan lahan tradisionalseru bukan? Paket ini berdurasi selama 3 hari dan 2 Malam.",
            "photo_wisata" => [
                "https://img.okezone.com/content/2021/07/20/406/2443283/pulau-padar-di-taman-nasional-komodo-buka-lagi-pengunjung-dibatasi-300-orang-fFZmqnCURI.JPG",
                "https://asset.kompas.com/crops/e-BQswJK7zHA0v7ilXk4IkTuxMk=/0x107:1280x960/750x500/data/photo/2020/08/03/5f27bf8eba616.jpeg",
                "https://i0.wp.com/labuanbajotour.com/wp-content/uploads/2019/08/Sawah-Lingko-Labuan-Bajo-sumber-ig-funadventure_.jpg?fit=750%2C500&ssl=1"
            ],
            "harga" => 500000
        ]);
        PaketWisata::create([
            "nama_paket" => "Paket Bajoe Nih",
            "destinasi_wisata" => [
                "Pulau Kelor",
                "Pantai Pink",
                "Gili Lawa Darat"
            ],
            "deskripsi" => "Siapa yang tidak menikmati prospek menjelajahi alam yang masih alami dan belum terpengaruh oleh peradaban?Destinasi wisata seperti ini bisa ditemukan di Pulau Kelor di Flores yang merupakan pulau kecil dengan pasir putih dan tanaman hijau di tengahnya, serta riak-riak kecil ombak yang tenang di perairan sekitarnya.Objek wisata Labuan Bajo ini wajib dikunjungi bagi yang menyukai warna pink. Jika dilihat dari sudut manapun, lokasinya asyik, sejuk, dan sangat pink!Sekedar berenang, berjemur atau snorkeling, apapun yang Anda pilih, apa yang Anda lihat dan rasakan akan memberikan kepuasan batin karena Anda telah menyaksikan kemegahan ciptaan Tuhan. Keren! Flores adalah rumah bagi sejumlah besar tempat wisata menakjubkan yang layak dikunjungi. Gili Laba yang juga dikenal dengan nama Gili Lawa Darat merupakan salah satu pulau yang termasuk dalam kelompok ini.Pulau kecil ini menyediakan lokasi yang menarik untuk menikmati keindahan alam Flores dari perspektif yang berbeda. Tunggu apalagi ? Labuan Bajo menunggu anda!",
            "photo_wisata" => [
                "https://img.okezone.com/content/2021/12/03/408/2511167/3-pesona-pulau-kelor-yang-ditawarkan-rp100-juta-di-situs-jual-beli-online-JUN5V3UatU.jpg",
                "https://1.bp.blogspot.com/-oAJ03-DpLqo/V70ScoWHF1I/AAAAAAAAFgY/rnWg8fRlM4k8bcBWep0zA2vISr1df5AUACLcB/w1280-h720-p-k-no-nu/pantai%2Bpink%2Blombok%2Bntb.jpg",
                "https://asset.kompas.com/crops/9Slcu7CICDsI0Xk4Owdib7_qSwQ=/0x29:1000x696/750x500/data/photo/2018/08/03/1291086549.JPG"
            ],
            "harga" => 800000
        ]);
    }
}
