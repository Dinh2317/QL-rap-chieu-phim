<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class NhanVienSeeder extends Seeder
{
    public function run(): void
    {
        $nhanVien = [
            [
                'email' => 'quoclongdng@gmail.com',
                'ho_va_ten' => 'Admin',
                'password' => '123456',
                'so_dien_thoai' => '0901234567',
                'dia_chi' => '123 Nguyễn Huệ, Q.1, TP.HCM',
                'ngay_sinh' => '1990-01-15',
                'tinh_trang' => 1,
                'id_chuc_vu' => 1,
            ],
            [
                'email' => 'nhanvien@gmail.com',
                'ho_va_ten' => 'Mai An Tiêm',
                'password' => '123456',
                'so_dien_thoai' => '0901234567',
                'dia_chi' => '123 Nguyễn Huệ, Q.1, TP.HCM',
                'ngay_sinh' => '1990-01-15',
                'tinh_trang' => 1,
                'id_chuc_vu' => 2,
            ],
            [
                'email' => 'thungan@cinema.com',
                'ho_va_ten' => 'Trạng Quỳnh',
                'password' => '123456',
                'so_dien_thoai' => '0909000003',
                'dia_chi' => '789 Trần Hưng Đạo, Q.5, TP.HCM',
                'ngay_sinh' => '1993-06-15',
                'tinh_trang' => 1,
                'id_chuc_vu' => 3,
            ],
            [
                'email' => 'soatve@cinema.com',
                'ho_va_ten' => 'Thạch Sanh',
                'password' => '123456',
                'so_dien_thoai' => '0909000004',
                'dia_chi' => '321 Hai Bà Trưng, Q.3, TP.HCM',
                'ngay_sinh' => '1995-09-10',
                'tinh_trang' => 1,
                'id_chuc_vu' => 6,
            ],
            [
                'email' => 'bapnuoc@cinema.com',
                'ho_va_ten' => 'Tý Quậy',
                'password' => '123456',
                'so_dien_thoai' => '0909000005',
                'dia_chi' => '654 Nguyễn Trãi, Q.5, TP.HCM',
                'ngay_sinh' => '1998-11-25',
                'tinh_trang' => 1,
                'id_chuc_vu' => 5,
            ],
            [
                'email' => 'kythuat@cinema.com',
                'ho_va_ten' => 'Thỏ 7 Màu',
                'password' => '123456',
                'so_dien_thoai' => '0909000005',
                'dia_chi' => '654 Nguyễn Trãi, Q.5, TP.HCM',
                'ngay_sinh' => '1998-11-25',
                'tinh_trang' => 1,
                'id_chuc_vu' => 4,
            ]
        ];
        DB::table('nhan_viens')->truncate();
        DB::table('nhan_viens')->delete();
        DB::table('nhan_viens')->insert($nhanVien);
    }
}
