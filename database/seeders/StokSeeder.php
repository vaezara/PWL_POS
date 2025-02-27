<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['stok_id' => 1, 'barang_id' => 1, 'user_id' => 1, 'stok_tanggal' => Carbon::now(), 'stok_jumlah' => 50],
            ['stok_id' => 2, 'barang_id' => 2, 'user_id' => 2, 'stok_tanggal' => Carbon::now()->subDays(2), 'stok_jumlah' => 60],
            ['stok_id' => 3, 'barang_id' => 3, 'user_id' => 3, 'stok_tanggal' => Carbon::now()->subHours(15), 'stok_jumlah' => 70],
            ['stok_id' => 4, 'barang_id' => 4, 'user_id' => 1, 'stok_tanggal' => Carbon::now()->subMinutes(30), 'stok_jumlah' => 80],
            ['stok_id' => 5, 'barang_id' => 5, 'user_id' => 2, 'stok_tanggal' => Carbon::now()->subSeconds(10), 'stok_jumlah' => 10],
            ['stok_id' => 6, 'barang_id' => 6, 'user_id' => 3, 'stok_tanggal' => Carbon::create(2025, 2, 20, 14, 02, 0), 'stok_jumlah' => 20],
            ['stok_id' => 7, 'barang_id' => 7, 'user_id' => 1, 'stok_tanggal' => Carbon::parse('2025-02-21 18:45:00'), 'stok_jumlah' => 30],
            ['stok_id' => 8, 'barang_id' => 8, 'user_id' => 2, 'stok_tanggal' => Carbon::now()->format('Y-m-d H:i:s'), 'stok_jumlah' => 40],
            ['stok_id' => 9, 'barang_id' => 9, 'user_id' => 3, 'stok_tanggal' => Carbon::now(), 'stok_jumlah' => 50],
            ['stok_id' => 10, 'barang_id' => 10, 'user_id' => 1, 'stok_tanggal' => Carbon::now()->subDays(3), 'stok_jumlah' => 60],
        ];
        DB::table('t_stok')->insert($data);
    }
}