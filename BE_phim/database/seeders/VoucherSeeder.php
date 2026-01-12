<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VoucherSeeder extends Seeder
{
    public function run(): void
    {
        $vouchers = [
            [
                'ma_code' => 'WELCOME2024',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addMonths(1),
                'so_giam_gia' => 20, // 20%
                'so_tien_toi_da' => 100,
                'so_tien_giam_gia' => 25,
                'tinh_trang' => 1, // 1: Hoạt động
            ],
            [
                'ma_code' => 'MEMBER50K',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addMonths(2),
                'so_giam_gia' => 50, // 50%
                'so_tien_toi_da' => 50,
                'so_tien_giam_gia' => 15,
                'tinh_trang' => 1,
            ],
            [
                'ma_code' => 'COMBO30',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addWeeks(2),
                'so_giam_gia' => 30, // 30%
                'so_tien_toi_da' => 50,
                'so_tien_giam_gia' => 25,
                'tinh_trang' => 1,
            ],
            [
                'ma_code' => 'SUMMER25',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addMonths(2),
                'so_giam_gia' => 25,
                'so_tien_toi_da' => 150,
                'so_tien_giam_gia' => 30,
                'tinh_trang' => 1,
            ],
            [
                'ma_code' => 'FLASHSALE10',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addDays(7),
                'so_giam_gia' => 10,
                'so_tien_toi_da' => 50,
                'so_tien_giam_gia' => 10,
                'tinh_trang' => 1,
            ],
            [
                'ma_code' => 'NEWYEAR2025',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addMonths(3),
                'so_giam_gia' => 30,
                'so_tien_toi_da' => 200,
                'so_tien_giam_gia' => 40,
                'tinh_trang' => 1,
            ],
            [
                'ma_code' => 'FREESHIP50',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addDays(14),
                'so_giam_gia' => 15,
                'so_tien_toi_da' => 50,
                'so_tien_giam_gia' => 15,
                'tinh_trang' => 1,
            ],
            [
                'ma_code' => 'SALE40OFF',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addMonths(1),
                'so_giam_gia' => 40,
                'so_tien_toi_da' => 250,
                'so_tien_giam_gia' => 50,
                'tinh_trang' => 1,
            ],
            [
                'ma_code' => 'STUDENT15',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addMonths(2),
                'so_giam_gia' => 15,
                'so_tien_toi_da' => 80,
                'so_tien_giam_gia' => 12,
                'tinh_trang' => 1,
            ],
            [
                'ma_code' => 'WEEKEND20',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addDays(10),
                'so_giam_gia' => 20,
                'so_tien_toi_da' => 60,
                'so_tien_giam_gia' => 13,
                'tinh_trang' => 1,
            ],
            [
                'ma_code' => 'VIPMEMBER35',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addMonths(3),
                'so_giam_gia' => 35,
                'so_tien_toi_da' => 180,
                'so_tien_giam_gia' => 45,
                'tinh_trang' => 1,
            ],
            [
                'ma_code' => 'BLACKFRIDAY50',
                'thoi_gian_bat_dau' => Carbon::now(),
                'thoi_gian_ket_thuc' => Carbon::now()->addDays(5),
                'so_giam_gia' => 50,
                'so_tien_toi_da' => 300,
                'so_tien_giam_gia' => 70,
                'tinh_trang' => 1,
            ],
        ];
        DB::table('vouchers')->truncate();
        DB::table('vouchers')->delete();
        DB::table('vouchers')->insert($vouchers);
    }
}
