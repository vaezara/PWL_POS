<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' => 1, 'user_id' => 1, 'pembeli' => 'Ara', 'penjualan_kode' => 'PNJ001', 'penjualan_tanggal' => Carbon::now()],
            ['penjualan_id' => 2, 'user_id' => 2, 'pembeli' => 'Nova', 'penjualan_kode' => 'PNJ002', 'penjualan_tanggal' => Carbon::now()->subDays(1)],
            ['penjualan_id' => 3, 'user_id' => 3, 'pembeli' => 'Eliza', 'penjualan_kode' => 'PNJ003', 'penjualan_tanggal' => Carbon::now()->subDays(2)],
            ['penjualan_id' => 4, 'user_id' => 1, 'pembeli' => 'Rani', 'penjualan_kode' => 'PNJ004', 'penjualan_tanggal' => Carbon::now()->subDays(3)],
            ['penjualan_id' => 5, 'user_id' => 2, 'pembeli' => 'Anna', 'penjualan_kode' => 'PNJ005', 'penjualan_tanggal' => Carbon::now()->subDays(4)],
            ['penjualan_id' => 6, 'user_id' => 3, 'pembeli' => 'Elsa', 'penjualan_kode' => 'PNJ006', 'penjualan_tanggal' => Carbon::now()->subDays(5)],
            ['penjualan_id' => 7, 'user_id' => 1, 'pembeli' => 'Belle', 'penjualan_kode' => 'PNJ007', 'penjualan_tanggal' => Carbon::now()->subDays(6)],
            ['penjualan_id' => 8, 'user_id' => 2, 'pembeli' => 'Aura', 'penjualan_kode' => 'PNJ008', 'penjualan_tanggal' => Carbon::now()->subDays(7)],
            ['penjualan_id' => 9, 'user_id' => 3, 'pembeli' => 'Rora', 'penjualan_kode' => 'PNJ009', 'penjualan_tanggal' => Carbon::now()->subDays(8)],
            ['penjualan_id' => 10, 'user_id' => 1, 'pembeli' => 'Putri', 'penjualan_kode' => 'PNJ010', 'penjualan_tanggal' => Carbon::now()->subDays(9)],
        ];
        DB::table('t_penjualan')->insert($data);
    }
}