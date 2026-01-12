<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PhimSeeder::class,
            BaiVietSeeder::class,
            PhongChieuSeeder::class,
            BinhLuanSeeder::class,
            // GheSeeder::class,
            SuatChieuSeeder::class,
            // VeSeeder::class,
            ChucVuSeeder::class,
            NhanVienSeeder::class,
            KhachHangSeeder::class,
            DichVuSeeder::class,
            // ChiTietDichVuSeeder::class,
            VoucherSeeder::class,
            ChucNangSeeder::class,
            DonHangSeeder::class,
            // DanhGiaSeeder::class,
            // ChucNangSeeder::class,
            // PhanQuyenSeeder::class,
        ]);
    }
}
