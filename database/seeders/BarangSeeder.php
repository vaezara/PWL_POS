<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'KBY',
                'barang_nama' => 'Kebaya',
                'harga_beli' => 185000,
                'harga_jual' => 230000,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'HJB',
                'barang_nama' => 'Hijab Paris',
                'harga_beli' => 5000,
                'harga_jual' => 100000,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'WNBTCKL15',
                'barang_nama' => 'Wafer Nabati 15g',
                'harga_beli' => 1000,
                'harga_jual' => 2000,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'UTMCKL125',
                'barang_nama' => 'Ultramilk Coklat 125ml',
                'harga_beli' => 6000,
                'harga_jual' => 7000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'PHLLED11',
                'barang_nama' => 'Philips LED 11W',
                'harga_beli' => 10000,
                'harga_jual' => 14000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'MYKBLDR',
                'barang_nama' => 'Miyako Blender',
                'harga_beli' => 110000,
                'harga_jual' => 150000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'CKRPL',
                'barang_nama' => 'Cikrak Plastik',
                'harga_beli' => 12000,
                'harga_jual' => 15000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'SPIJ',
                'barang_nama' => 'Sapu Ijuk',
                'harga_beli' => 11000,
                'harga_jual' => 13000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => 'CSPXY',
                'barang_nama' => 'Cushion Pixy',
                'harga_beli' => 55000,
                'harga_jual' => 60000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'SPDZZL',
                'barang_nama' => 'Setting Spray Dazzle Me',
                'harga_beli' => 28000,
                'harga_jual' => 30000,
            ],
        ];
        DB::table('m_barang')->insert($data);
    }
}