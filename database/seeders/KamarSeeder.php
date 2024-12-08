<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('master_kamar')->insert([
            [
                'nama_kamar' => 'Standar',
                'deskripsi_kamar' => 'Kamar nya standar',
                'harga_kamar' => '10000',
                'fasilitas' => 'TV, Kasur',
                'stok' => 20
            ],
            [
                'nama_kamar' => 'Premium',
                'deskripsi_kamar' => 'Kamar nya Premium',
                'harga_kamar' => '20000',
                'fasilitas' => 'TV, Kasur, meja',
                'stok' => 20
            ],
            [
                'nama_kamar' => 'Luxury',
                'deskripsi_kamar' => 'Kamar nya Luxury',
                'harga_kamar' => '10000',
                'fasilitas' => 'TV, Kasur, meja, AC',
                'stok' => 20
            ],

        ]);
    }
}
