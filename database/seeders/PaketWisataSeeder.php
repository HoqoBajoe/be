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
        PaketWisata::create([
            "nama_paket" => "Paket Hoqo Bajoe I",
            "destinasi_wisata" => [
                "Pulau Kanawa",
                "Danau Kelimutu",
                "Goa Rangko Labuan Bajo"
            ],
            "deskripsi" => "Pulau Kanawa menawarkan laut biru sebening kristal, pantai pasir putih yang bersih, terumbu karang yang eksotis, dan pemandangan yang menakjubkan. Pulau Kanawa dan sekitarnya sangat indah, dan itu hanya gambaran singkat tentangnya. Pulau Kanawa tidak diragukan lagi adalah salah satu tujuan wisata terindah di Labuan Bajo, dan Anda harus mengunjunginya. Danau Kelimutu telah menggelitik minat mereka yang mengenalnya, baik melalui mitos, atmosfer, atau catatan sejarah. Pertimbangkan skenario berikut: tiga danau besar di puncak Gunung Kelimutu, masing-masing dengan warna yang berbeda dan kemampuan untuk berubah pada waktu tertentu. Tidak semua orang familiar dengan nama Goa Buaya, namun apapun sebutannya, semua orang mengenal keindahan tiada tara yang ditawarkan Goa Rangko.Pertimbangkan kemungkinan bahwa ada sebuah gua yang tersembunyi jauh di dalam interior bumi, diisi dengan air asin sebening kristal dan dihiasi dengan stalaktit yang menakjubkan",
            "photo_wisata" => [
                "https://i2.wp.com/www.ensiklopediaindonesia.com/wp-content/uploads/2013/02/pulau-kanawa-by-@anungadithya17.jpg?fit=1080%2C809&ssl=1&resize=1280%2C720",
                "https://ilmugeografi.com/wp-content/uploads/2022/03/danau-kelimutu.jpg",
                "https://www.tempatwisata.pro/users_media/3136/Goa%20Rangko%20NTT.jpg"
            ],
            "harga" => 850000
        ]);
        PaketWisata::create([
            "nama_paket" => "Paket Hoqo Bajoe II",
            "destinasi_wisata" => [
                "Atol Mangiatan",
                "Cunca Wulang",
                "Desa Tradisional Bena, Bajawa"
            ],
            "deskripsi" => "Atol Mangiatan adalah pulau karang berbentuk lingkaran yang menurut Kamus Besar Bahasa Indonesia biasanya dikelilingi oleh danau atau laguna di tengahnya. Membaca definisinya saja sudah bisa merasakan betapa eksotisnya destinasi wisata di Labuan Bajo ini. Anda yang ingin memanjakan mata dan hati di lokasi yang sedikit berbeda di Flores dan Labuan Bajo bisa langsung menuju Cunca Wulang. Anda tidak hanya akan menemukan lembah Instagenic, tetapi Anda juga akan menemukan air terjun yang eksotis. Selain Wae Rebo yang menawan, ada desa lain di Flores bernama Kampung Bena yang tak kalah menarik dari Wae Rebo. Pemandangan panorama Gunung Inerie yang menjadi latar belakang desa yang menarik dapat dinikmati dari puncak desa megalitik yang terletak di atas bukit ini. Rumah-rumah yang dibangun dengan gaya tradisional dan tradisi leluhur yang masih dilestarikan menambah daya tarik desa yang eksotis. Saat berkunjung ke Flores, Anda wajib mampir ke sini!",
            "photo_wisata" => [
                "https://i0.wp.com/labuanbajotour.com/wp-content/uploads/2018/09/Pulau-Mangiatan-sumber-ig-sabanarancaak.jpg",
                "https://phinemo.com/wp-content/uploads/2018/09/Air-Terjun-Cunca-Wulang-labuan-bajo.jpg",
                "https://www.goodnewsfromindonesia.id/uploads/post/large-shutterstock-1800896062-d647ca383746bbfcf07e309162150ea7.jpg"
            ],
            "harga" => 1000000
        ]);
        PaketWisata::create([
            "nama_paket" => "Paket Healing ala Hoqo Bajoe",
            "destinasi_wisata" => [
                "Taka Makassar",
                "Manta Point",
                "Goa Batu Cermin"
            ],
            "deskripsi" => "Jika Anda ingin melihat sesuatu yang unik di Flores, Taka Makassar adalah tempat yang baik untuk mulai mencari. Pulau pasir kecil ini, yang hanya muncul saat air surut dan tidak lebih besar dari lapangan sepak bola, hanya terlihat saat air surut. Taka Makassa dibuat lebih spektakuler dengan terumbu karang menakjubkan yang mengelilingi pulau, yang menambah keindahan alamnya. Ini adalah tujuan wisata paling populer di Flores, baik di kalangan penyelam pemula maupun berpengalaman. Selain bisa melihat alam bawah laut yang mempesona, Anda juga bisa melihat ikan Manta yang juga dikenal sebagai ikan pari raksasa, yang berenang dengan sangat ramah dari satu lokasi ke lokasi lain. Butuh beberapa saat sebelum kami dapat menyaksikan sendiri keajaiban Gua Batu Cermin. Namun, jika Anda tiba di waktu yang tepat, Anda akan mengerti mengapa lokasi ini diberi nama ini. Datanglah pada sore hari sebelum sore hari, sebagai aturan umum.",
            "photo_wisata" => [
                "https://i0.wp.com/rimbakita.com/wp-content/uploads/2020/03/taka-makassar.jpg",
                "https://www.superlive.id/storage/superadventure/2018/05/24/88be89e52bd2.jpg",
                "https://images.bisnis-cdn.com/posts/2020/07/07/1262931/goa-batu-cermin.jpg"
            ],
            "harga" => 725000
        ]);
    }
}
