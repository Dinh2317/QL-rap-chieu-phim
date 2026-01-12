<?php

namespace Database\Seeders;

use App\Models\ChiTietDichVu;
use App\Models\DichVu;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\Ve;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DonHangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('don_hangs')->truncate();
        DB::table('chi_tiet_dich_vus')->truncate();

        $khachHangs = KhachHang::all();
        $dichVus = DichVu::all();
        $ves = Ve::where('id_don_hang', 0)->get();

        // Tạo 50 đơn hàng mẫu
        for ($i = 0; $i < 50; $i++) {
            if ($ves->count() == 0) break;

            $khachHang = $khachHangs->random();
            $soLuongVe = rand(1, 5);

            $veChon = $ves->random(min($soLuongVe, $ves->count()));
            $ves = $ves->diff($veChon); // Loại bỏ vé đã chọn

            $tongTienVe = $veChon->sum('gia_ve');
            $tongTienDv = 0;

            // Random 0-3 dịch vụ
            $soLuongDv = rand(0, 3);
            $dvs = $soLuongDv > 0 ? $dichVus->random($soLuongDv) : collect([]);

            foreach ($dvs as $dv) {
                $tongTienDv += $dv->gia;
            }

            $tongTien = $tongTienVe + $tongTienDv;
            $tien_giam_gia = 0;

            do {
                $maDonHang = 'DH' . substr(Str::uuid()->toString(), 0, 8);
            } while (DonHang::where('ma_don_hang', $maDonHang)->exists());

            $donHang = DonHang::create([
                'id_khach_hang' => $khachHang->id,
                'ma_don_hang' => $maDonHang,
                'ngay_dat' => Carbon::today()->subDays(rand(0, 30)),
                'tien_thuc_nhan' => $tongTien - $tien_giam_gia,
                'tong_tien' => $tongTien,
                'giam_gia' => $tien_giam_gia,
                'is_thanh_toan' => 1,
                'id_voucher' => 0
            ]);

            // Cập nhật vé
            Ve::whereIn('id', $veChon->pluck('id'))->update([
                'id_don_hang' => $donHang->id
            ]);

            // Tạo chi tiết dịch vụ
            foreach ($dvs as $dv) {
                ChiTietDichVu::create([
                    'id_don_hang' => $donHang->id,
                    'id_dich_vu' => $dv->id,
                    'don_gia' => $dv->gia,
                    'ghi_chu' => ''
                ]);
            }
        }
    }
}
