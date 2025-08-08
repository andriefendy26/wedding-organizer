<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data layanan
        $dataLayanan = [
            [
                'nama' => 'Wedding Organizer',
                'deskripsi' => 'Layanan perencanaan pernikahan lengkap mulai dari konsep, dekorasi, dokumentasi, hingga koordinasi hari H.'
            ],
            [
                'nama' => 'Sewa Barang',
                'deskripsi' => 'Layanan penyewaan perlengkapan acara seperti tenda, kursi, meja, sound system, dan lainnya.'
            ],
        ];
        
        $dataInclude = [
            ['nama_include' => 'Dekorasi'],
            ['nama_include' => 'Sewa Tempat'],
            ['nama_include' => 'MUA + GROW'],
            ['nama_include' => 'Multimedia'],
            ['nama_include' => 'Hiburan'],
            ['nama_include' => 'Tim Organizer'],
            ['nama_include' => 'Seserahan'],
            ['nama_include' => 'Free Item'],
        ];

        foreach ($dataInclude as $Include){
            $includeId = DB::table('tb_include')->insertGetId($Include);

            $items = [];

            switch ($Include['nama_include']) {
                case 'Dekorasi':
                    $items = [
                        'Pelaminan, Taman Depan',
                        'Pelaminan, Karpet Jalan',
                        'Standing Flower, Pragola',
                        'Lantai Kaca, Pintu Masuk',
                        'Photo Booth'
                    ];
                    break;

                case 'Sewa Tempat':
                    $items = [
                        'Kursi + Cover 100',
                        'Meja Panjang + Rumple 4',
                        'Meja Bulat + Rumple 6',
                        'Meja Souvenir',
                        'Kipas Tornado 2'
                    ];
                    break;

                case 'MUA + GROW':
                    $items = [
                        '1x Makeup',
                        '1x Retouch',
                        '2 Pasang Gown',
                        'Soflens',
                        'Hand Bouquet',
                        'Henna'
                    ];
                    break;

                case 'Multimedia':
                    $items = [
                        'Cetak 150 Foto Uk. 4R',
                        'Album Magnetic',
                        'Video Liputan',
                        'Video Cinematic',
                        'All Files in Flashdisk'
                    ];
                    break;

                case 'Hiburan':
                    $items = [
                        'SoundSystem',
                        'Operator',
                        'Acoustic / Electone'
                    ];
                    break;

                case 'Tim Organizer':
                    $items = [
                        'Master of Ceremony',
                        'PIC CPP',
                        'PIC CPW',
                        'Helper',
                        'Casual'
                    ];
                    break;

                case 'Seserahan':
                    $items = [
                        'Mahar + Ring Box',
                        'Seserahan 5 Box'
                    ];
                    break;

                case 'Free Item':
                    $items = [
                        'Mobil + Dekor Mobil',
                        'Kamar Hotel 1 Malam',
                        'Undangan Digital',
                        'Undangan Cetak',
                        'Makeup 2 orang',
                        'Jas 2 pcs',
                        'Lighting',
                        'Confetti',
                        'Kembang Api'
                    ];
                    break;
            }

            foreach ($items as $item) {
                DB::table('tb_item_include')->insert([
                    'include_id' => $includeId,
                    'nama_item' => $item
                ]);
            }
        }
        

        // Insert layanan dan ambil id-nya
        foreach ($dataLayanan as $layanan) {
            $layananId = DB::table('tb_layanan')->insertGetId($layanan);

            // Tambahkan paket berdasarkan layanan
            if ($layanan['nama'] === 'Wedding Organizer') {
                DB::table('tb_paket_layanan')->insert([
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Rumahan A',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  20000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Rumahan B',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  23000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Rumahan C',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  30000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Rumahan D',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  30000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Gedung Wanita ',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  38500000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Gedung KPKNL ',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  44000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Gedung Wisma Indoor ',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  33000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Gedung Bandara',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  41000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Gedung Gajah Mada',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  40000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Gedung Serba Guna',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  38000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Hotel Swiss Bell',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  50000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Hotel Monaco',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  29500000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Hotel Diamond',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  30500000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Hotel Galaxy',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  30000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Hotel Paradise',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  34000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Hotel Lotus Panaya',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  63000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Hotel PT Bulungan',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  28000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Hotel PT Kayan',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  98000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'Wisma Putra Outdoor',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  48500000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'AL-Ma`Arif 1',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  43000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'AL-Ma`Arif 2',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  48000000,
                    ],
                    [
                        'layanan_id'   => $layananId,
                        'nama_paket'   => 'JL Cafe',
                        'detail_paket' => 'Dekorasi standar, dokumentasi foto, 1 MC, 1 tim WO.',
                        'deskripsi'    => 'Paket pernikahan sederhana dengan dekorasi minimalis dan dokumentasi dasar.',
                        'harga'        =>  43000000,
                    ],
                ]);
            }

            if ($layanan['nama'] === 'Sewa Barang') {
                DB::table('tb_barang')->insert([
                    // Kursi
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'kursi_plastik.jpg',
                        'nama'       => 'Kursi Plastik',
                        'deskripsi'  => 'Kursi serbaguna berbahan plastik berkualitas, ringan, mudah ditata, dan cocok untuk acara skala besar maupun kecil.',
                        'harga'      => 5000,
                        'stock'      => 500,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'kursi_plastik_cover.jpg',
                        'nama'       => 'Kursi Plastik + Cover',
                        'deskripsi'  => 'Kursi plastik yang dilengkapi sarung (cover) kain dekoratif, memberikan tampilan lebih formal dan elegan untuk keperluan resepsi, seminar, atau seremoni.',
                        'harga'      => 8000,
                        'stock'      => 400,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'kursi_chitose.jpg',
                        'nama'       => 'Kursi Chitose',
                        'deskripsi'  => 'Kursi premium berbahan plastik tebal dengan rangka kokoh, menawarkan kenyamanan dan kesan profesional.',
                        'harga'      => 12000,
                        'stock'      => 200,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'kursi_chitose_cover.jpg',
                        'nama'       => 'Kursi Chitose + Cover',
                        'deskripsi'  => 'Kursi Chitose yang dilengkapi dengan penutup kain dekoratif untuk tampilan eksklusif pada acara formal.',
                        'harga'      => 15000,
                        'stock'      => 150,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],

                    // Meja
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'meja_panjang.jpg',
                        'nama'       => 'Meja Panjang',
                        'deskripsi'  => 'Meja model panjang berbahan kayu atau plywood dilapisi formica, digunakan untuk meja prasmanan, registrasi, atau keperluan logistik acara.',
                        'harga'      => 35000,
                        'stock'      => 50,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'meja_panjang_rumple.jpg',
                        'nama'       => 'Meja Panjang + Rumple',
                        'deskripsi'  => 'Meja panjang yang sudah dilengkapi dengan rumple (skirting) dekoratif untuk tampilan lebih rapi dan menarik.',
                        'harga'      => 45000,
                        'stock'      => 40,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'round_table.jpg',
                        'nama'       => 'Round Table',
                        'deskripsi'  => 'Meja bundar berkapasitas 6–10 orang, cocok untuk acara gala dinner, resepsi, atau jamuan resmi.',
                        'harga'      => 50000,
                        'stock'      => 30,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'round_table_rumple.jpg',
                        'nama'       => 'Round Table + Rumple',
                        'deskripsi'  => 'Meja bundar yang sudah lengkap dengan dekorasi rumple, memberikan estetika visual yang mewah.',
                        'harga'      => 65000,
                        'stock'      => 25,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],

                    // Sofa & VIP
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'sofa_vip_set.jpg',
                        'nama'       => 'Sofa + Meja (4 Sofa + 2 Meja VIP)',
                        'deskripsi'  => 'Paket lounge set terdiri dari 4 unit sofa dan 2 meja VIP, ideal untuk area tamu kehormatan atau ruang tunggu khusus.',
                        'harga'      => 500000,
                        'stock'      => 5,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],

                    // Kipas & AC
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'kipas_angin.jpg',
                        'nama'       => 'Kipas Angin',
                        'deskripsi'  => 'Kipas angin berdaya tinggi untuk sirkulasi udara pada ruangan indoor maupun outdoor.',
                        'harga'      => 75000,
                        'stock'      => 20,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'mistyfun.jpg',
                        'nama'       => 'Mistyfun (Kipas Embun)',
                        'deskripsi'  => 'Kipas angin dengan fitur penyemprotan embun air untuk menjaga suhu udara tetap sejuk di area luar ruangan.',
                        'harga'      => 150000,
                        'stock'      => 10,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'ac_3pk.jpg',
                        'nama'       => 'AC 3PK',
                        'deskripsi'  => 'Unit pendingin udara kapasitas 3PK, efektif untuk ruangan berkapasitas sedang.',
                        'harga'      => 400000,
                        'stock'      => 8,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'ac_5pk.jpg',
                        'nama'       => 'AC 5PK',
                        'deskripsi'  => 'Unit pendingin udara kapasitas 5PK, digunakan untuk ruangan berkapasitas besar atau area tenda tertutup.',
                        'harga'      => 600000,
                        'stock'      => 5,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],

                    // Dekorasi Taman
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'taman_daun.jpg',
                        'nama'       => 'Taman Daun',
                        'deskripsi'  => 'Dekorasi taman berbasis elemen dedaunan sintetis yang dirancang untuk menciptakan suasana alami dan hijau.',
                        'harga'      => 300000,
                        'stock'      => 15,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'taman_bunga_segar.jpg',
                        'nama'       => 'Taman Bunga Segar',
                        'deskripsi'  => 'Instalasi taman menggunakan bunga segar berkualitas untuk memberikan kesan mewah dan alami dalam sebuah event.',
                        'harga'      => 800000,
                        'stock'      => 10,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'taman_bunga_plastik.jpg',
                        'nama'       => 'Taman Bunga Plastik',
                        'deskripsi'  => 'Alternatif ekonomis dari taman bunga segar, menggunakan material sintetis berkualitas tinggi.',
                        'harga'      => 400000,
                        'stock'      => 12,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],

                    // Tenda Sarnavil
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'tenda_sarnavil_3x3.jpg',
                        'nama'       => 'Tenda Sarnavil Uk. 3x3m',
                        'deskripsi'  => 'Tenda eksklusif berbentuk kerucut, ukuran 3x3 meter, cocok untuk booth, registrasi, atau mini lounge.',
                        'harga'      => 500000,
                        'stock'      => 8,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'tenda_sarnavil_3x3_dekor.jpg',
                        'nama'       => 'Tenda Sarnavil Uk. 3x3m + Dekor',
                        'deskripsi'  => 'Tenda Sarnavil 3x3m yang telah dilengkapi dekorasi interior dan eksterior sesuai tema acara.',
                        'harga'      => 750000,
                        'stock'      => 6,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'tenda_sarnavil_5x5.jpg',
                        'nama'       => 'Tenda Sarnavil Uk. 5x5m',
                        'deskripsi'  => 'Tenda kerucut eksklusif berukuran 5x5 meter, ideal untuk stan VIP atau area penting lainnya.',
                        'harga'      => 800000,
                        'stock'      => 4,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'tenda_sarnavil_5x5_dekor.jpg',
                        'nama'       => 'Tenda Sarnavil Uk. 5x5m + Dekor',
                        'deskripsi'  => 'Tenda Sarnavil dengan penambahan dekorasi untuk memperkuat identitas visual acara.',
                        'harga'      => 1200000,
                        'stock'      => 3,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],

                    // Tenda Sisir
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'tenda_sisir_4x6.jpg',
                        'nama'       => 'Tenda Sisir Uk. 4x6m',
                        'deskripsi'  => 'Tenda struktural model sisir (atap miring dua sisi) berukuran 4x6 meter, digunakan untuk pelindung area tamu atau makan.',
                        'harga'      => 600000,
                        'stock'      => 6,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'tenda_sisir_4x6_dekor.jpg',
                        'nama'       => 'Tenda Sisir Uk. 4x6m + Dekor',
                        'deskripsi'  => 'Versi dekoratif dari tenda 4x6m yang sudah dihiasi langit-langit dan dinding kain.',
                        'harga'      => 900000,
                        'stock'      => 4,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'tenda_sisir_6x6.jpg',
                        'nama'       => 'Tenda Sisir Uk. 6x6m',
                        'deskripsi'  => 'Tenda berukuran 6x6 meter dengan struktur kuat dan tampilan seragam, cocok untuk area utama acara.',
                        'harga'      => 800000,
                        'stock'      => 5,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'tenda_sisir_6x6_dekor.jpg',
                        'nama'       => 'Tenda Sisir Uk. 6x6m + Dekor',
                        'deskripsi'  => 'Tenda 6x6m dengan tambahan elemen dekoratif di seluruh bagian dalam dan luar.',
                        'harga'      => 1200000,
                        'stock'      => 3,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],

                    // Tenda Semi Roder
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'tenda_mini_semi_roder_5x8.jpg',
                        'nama'       => 'Tenda Mini Semi Roder Uk. 5x8m',
                        'deskripsi'  => 'Tenda semi-roder berukuran kecil, cocok untuk keperluan tambahan seperti dapur katering atau area penyimpanan.',
                        'harga'      => 700000,
                        'stock'      => 4,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'tenda_mini_semi_roder_5x8_dekor.jpg',
                        'nama'       => 'Tenda Mini Semi Roder Uk. 5x8m + Dekor',
                        'deskripsi'  => 'Tenda mini semi-roder yang telah didesain sesuai dengan tema acara.',
                        'harga'      => 1000000,
                        'stock'      => 3,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'tenda_semi_roder_6x12.jpg',
                        'nama'       => 'Tenda Semi Roder Uk. 6x12m',
                        'deskripsi'  => 'Tenda besar dengan rangka baja semi-roder, cocok untuk acara semi-formal atau gathering.',
                        'harga'      => 1500000,
                        'stock'      => 2,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [
                        'layanan_id' => $layananId,
                        'foto'       => 'tenda_semi_roder_6x12_dekor.jpg',
                        'nama'       => 'Tenda Semi Roder Uk. 6x12m + Dekor',
                        'deskripsi'  => 'Versi dekoratif dari tenda semi-roder, telah dilengkapi ceiling dan dinding kain sesuai desain tema.',
                        'harga'      => 2000000,
                        'stock'      => 2,
                        'status'     => 'tersedia',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
            }
        }
    }
}