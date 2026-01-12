<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GheSeeder extends Seeder
{
    public function run(): void
    {
        $ghe = [];
        // $hangGhe = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];

        // // Tạo ghế cho Phòng 1 (8x8 = 64 ghế)
        // for ($i = 0; $i < 8; $i++) {
        //     for ($j = 1; $j <= 8; $j++) {
        //         $ghe[] = [
        //             'ten_ghe' => $hangGhe[$i] . $j,
        //             'tinh_trang' => 1,
        //             'id_phong_chieu' => 1,
        //         ];
        //     }
        // }

        // // Tạo ghế cho Phòng 2 (6x8 = 48 ghế)
        // for ($i = 0; $i < 6; $i++) {
        //     for ($j = 1; $j <= 8; $j++) {
        //         $ghe[] = [
        //             'ten_ghe' => $hangGhe[$i] . $j,
        //             'tinh_trang' => 1,
        //             'id_phong_chieu' => 2,
        //         ];
        //     }
        // }

        // // Tạo ghế cho Phòng VIP (6x6 = 36 ghế)
        // for ($i = 0; $i < 6; $i++) {
        //     for ($j = 1; $j <= 6; $j++) {
        //         $ghe[] = [
        //             'ten_ghe' => $hangGhe[$i] . $j,
        //             'tinh_trang' => 1,
        //             'id_phong_chieu' => 3,
        //         ];
        //     }
        // }

        DB::table('ghes')->truncate();
        DB::table('ghes')->delete();
        DB::table('ghes')->insert($ghe);
    }
}
