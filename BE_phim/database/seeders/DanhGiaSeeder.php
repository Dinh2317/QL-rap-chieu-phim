<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DanhGiaSeeder extends Seeder
{
    public function run(): void
    {
        $danhGias = [
            [
                'id_khach_hang' => 1,
                'id_ve' => 1,
                'so_sao' => 5,
                'noi_dung' => 'Phim rất hay, tôi rất thích cách triển khai cốt truyện và diễn xuất của các diễn viên.',
                'tinh_trang' => 1,
            ],
            [
                'id_khach_hang' => 2,
                'id_ve' => 2,
                'so_sao' => 4,
                'noi_dung' => 'Nội dung phim thú vị, hiệu ứng hình ảnh đẹp. Tuy nhiên âm thanh hơi nhỏ.',
                'tinh_trang' => 1,
            ],
            [
                'id_khach_hang' => 3,
                'id_ve' => 3,
                'so_sao' => 3,
                'noi_dung' => 'Phim bình thường, không quá đặc sắc nhưng vẫn đáng xem.',
                'tinh_trang' => 1,
            ],
        ];
        DB::table('danh_gias')->truncate();
        DB::table('danh_gias')->delete();
        DB::table('danh_gias')->insert($danhGias);
    }
}
