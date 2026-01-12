<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucNangSeeder extends Seeder
{
    public function run(): void
    {
        $chucNang = [
            [
                'ten_chuc_nang' => 'Quản lý phim',
            ],
            [
                'ten_chuc_nang' => 'Quản lý suất chiếu',
            ],
            [
                'ten_chuc_nang' => 'Quản lý nhân viên',

            ],
            [
                'ten_chuc_nang' => 'Quản lý khách hàng',
            ],
            [
                'ten_chuc_nang' => 'Quản lý voucher',
            ],
            [
                'ten_chuc_nang' => 'Quản lý dịch vụ',

            ],
            [
                'ten_chuc_nang' => 'Báo cáo thống kê',
            ],
            [
                'ten_chuc_nang' => 'Quản lý phòng chiếu',
            ],
            [
                'ten_chuc_nang' => 'Quản lý hệ thống',
            ],
            [
                'ten_chuc_nang' => 'Quản lý phòng chiếu',
            ],
        ];
        DB::table('chuc_nangs')->truncate();
        DB::table('chuc_nangs')->delete();
        DB::table('chuc_nangs')->insert($chucNang);
    }
}
