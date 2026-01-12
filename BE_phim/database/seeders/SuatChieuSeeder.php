<?php

namespace Database\Seeders;

use App\Models\Phim;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SuatChieuSeeder extends Seeder
{
    public function run(): void
    {
        $suatChieu = [];
        $showtimes = [
            ['bat_dau' => '09:00:00', 'ket_thuc' => '11:00:00'],
            ['bat_dau' => '11:30:00', 'ket_thuc' => '13:30:00'],
            ['bat_dau' => '14:00:00', 'ket_thuc' => '16:00:00'],
            ['bat_dau' => '16:30:00', 'ket_thuc' => '18:30:00'],
            ['bat_dau' => '19:00:00', 'ket_thuc' => '21:00:00'],
            ['bat_dau' => '21:30:00', 'ket_thuc' => '23:30:00'],
        ];

        $startDate = Carbon::create(2025, 7, 1);
        $days = 7;
        $phimDangChieu = Phim::where('tinh_trang', 2)->pluck('id')->toArray();

        for ($day = 0; $day < $days; $day++) {
            $currentDate = $startDate->copy()->addDays($day);
            // Chọn ngẫu nhiên số lượng phim trong khoảng (3-8) phim mỗi ngày để tạo sự khác biệt
            $soPhimTrongNgay = rand(3, min(9, count($phimDangChieu)));
            // Lấy ngẫu nhiên phim trong ngày không trùng lặp
            $phimTrongNgay = collect($phimDangChieu)->shuffle()->take($soPhimTrongNgay);
            foreach ($phimTrongNgay as $id_phim) {
                // Số suất chiếu mỗi phim trong ngày khác nhau (1-3 suất)
                $soSuatPhimTrongNgay = rand(1, 4);
                // Lấy ngẫu nhiên khung giờ chiếu cho phim đó
                $khungGioTrongNgay = collect($showtimes)->shuffle()->take($soSuatPhimTrongNgay);
                // Chọn ngẫu nhiên phòng chiếu
                $phongChieuIds = range(1, 10);
                shuffle($phongChieuIds);
                foreach ($khungGioTrongNgay as $index => $showtime) {
                    $suatChieu[] = [
                        'id_phim' => $id_phim,
                        'id_phong_chieu' => $phongChieuIds[$index % 10], // tránh trùng phòng
                        'ngay_chieu' => $currentDate->toDateString(),
                        'thoi_gian_bat_dau' => $showtime['bat_dau'],
                        'thoi_gian_ket_thuc' => $showtime['ket_thuc'],
                        'tinh_trang' => 1,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }

        DB::table('suat_chieus')->truncate();
        DB::table('suat_chieus')->delete();
        DB::table('suat_chieus')->insert($suatChieu);
    }
}
