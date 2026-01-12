<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhanQuyenSeeder extends Seeder
{
    public function run(): void
    {
        $phanQuyen = [
            // Quản lý có tất cả quyền
            [
                'chuc_vu_id' => 1, // Quản lý
                'chuc_nang_id' => 1, // Quản lý phim
                'trang_thai' => 1,
            ],
            [
                'chuc_vu_id' => 1,
                'chuc_nang_id' => 2, // Quản lý suất chiếu
                'trang_thai' => 1,
            ],
            [
                'chuc_vu_id' => 1,
                'chuc_nang_id' => 3, // Quản lý nhân viên
                'trang_thai' => 1,
            ],
            [
                'chuc_vu_id' => 1,
                'chuc_nang_id' => 4, // Quản lý khách hàng
                'trang_thai' => 1,
            ],
            [
                'chuc_vu_id' => 1,
                'chuc_nang_id' => 5, // Quản lý voucher
                'trang_thai' => 1,
            ],
            [
                'chuc_vu_id' => 1,
                'chuc_nang_id' => 6, // Quản lý dịch vụ
                'trang_thai' => 1,
            ],
            [
                'chuc_vu_id' => 1,
                'chuc_nang_id' => 7, // Báo cáo thống kê
                'trang_thai' => 1,
            ],

            // Nhân viên bán vé có quyền xem phim, suất chiếu, khách hàng và voucher
            [
                'chuc_vu_id' => 2, // Nhân viên bán vé
                'chuc_nang_id' => 1,
                'trang_thai' => 1,
            ],
            [
                'chuc_vu_id' => 2,
                'chuc_nang_id' => 2,
                'trang_thai' => 1,
            ],
            [
                'chuc_vu_id' => 2,
                'chuc_nang_id' => 4,
                'trang_thai' => 1,
            ],
            [
                'chuc_vu_id' => 2,
                'chuc_nang_id' => 5,
                'trang_thai' => 1,
            ],

            // Nhân viên kỹ thuật có quyền xem phim và suất chiếu
            [
                'chuc_vu_id' => 3, // Nhân viên kỹ thuật
                'chuc_nang_id' => 1,
                'trang_thai' => 1,
            ],
            [
                'chuc_vu_id' => 3,
                'chuc_nang_id' => 2,
                'trang_thai' => 1,
            ],

            // Nhân viên bán đồ ăn có quyền xem và quản lý dịch vụ
            [
                'chuc_vu_id' => 4, // Nhân viên bán đồ ăn
                'chuc_nang_id' => 6,
                'trang_thai' => 1,
            ],
        ];
        DB::table('phan_quyens')->truncate();
        DB::table('phan_quyens')->delete();
        DB::table('phan_quyens')->insert($phanQuyen);
    }
}
