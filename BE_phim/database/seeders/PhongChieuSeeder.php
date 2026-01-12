<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhongChieuSeeder extends Seeder
{
    public function run(): void
    {
        $phongChieu = [
            [
                'ten_phong' => 'Phòng 1',
                'hang_ngang' => 8,
                'hang_doc' => 10,
                'is_active' => 1,
                'tinh_trang' => 1,
            ],
            [
                'ten_phong' => 'Phòng 2',
                'hang_ngang' => 10,
                'hang_doc' => 11,
                'is_active' => 1,
                'tinh_trang' => 1,
            ],
            [
                'ten_phong' => 'Phòng 3',
                'hang_ngang' => 9,
                'hang_doc' => 9,
                'is_active' => 1,
                'tinh_trang' => 1,
            ],
            [
                'ten_phong' => 'Phòng 4',
                'hang_ngang' => 9,
                'hang_doc' => 10,
                'is_active' => 1,
                'tinh_trang' => 1,
            ],
            [
                'ten_phong' => 'Phòng 5',
                'hang_ngang' => 8,
                'hang_doc' => 9,
                'is_active' => 1,
                'tinh_trang' => 1,
            ],
            [
                'ten_phong' => 'Phòng 6',
                'hang_ngang' => 7,
                'hang_doc' => 9,
                'is_active' => 1,
                'tinh_trang' => 1,
            ],
            [
                'ten_phong' => 'Phòng 7',
                'hang_ngang' => 8,
                'hang_doc' => 10,
                'is_active' => 1,
                'tinh_trang' => 1,
            ],
            [
                'ten_phong' => 'Phòng 8',
                'hang_ngang' => 8,
                'hang_doc' => 8,
                'is_active' => 1,
                'tinh_trang' => 1,
            ],
            [
                'ten_phong' => 'Phòng 9',
                'hang_ngang' => 8,
                'hang_doc' => 10,
                'is_active' => 1,
                'tinh_trang' => 1,
            ],
            [
                'ten_phong' => 'Phòng 10',
                'hang_ngang' => 10,
                'hang_doc' => 11,
                'is_active' => 1,
                'tinh_trang' => 1,
            ]
        ];

        DB::table('phong_chieus')->truncate();
        DB::table('phong_chieus')->delete();
        DB::table('phong_chieus')->insert($phongChieu);
    }
}
