<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChiTietDichVuSeeder extends Seeder
{
    public function run(): void
    {
        $chiTietDichVus = [];
        DB::table('chi_tiet_dich_vus')->truncate();
        DB::table('chi_tiet_dich_vus')->delete();
        DB::table('chi_tiet_dich_vus')->insert($chiTietDichVus);
    }
}
