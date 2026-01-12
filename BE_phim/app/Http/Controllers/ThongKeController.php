<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDichVu;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\SuatChieu;
use App\Models\Ve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ThongKeController extends Controller
{
    public function thongKeKHMoi(Request $request)
    {
        $data = KhachHang::whereDate(DB::raw('DATE(created_at)'), '>=', $request->begin)
            ->whereDate(DB::raw('DATE(created_at)'), '<=', $request->end)
            ->select(DB::raw('DATE(created_at) as ngay_dang_ky'), DB::raw('COUNT(id) as so_khach_hang_moi'))
            ->groupBy('ngay_dang_ky')
            ->orderBy('ngay_dang_ky')
            ->get();
        $colors = [];
        foreach ($data->pluck('ngay_dang_ky') as $v) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF)); // random hex color
        }
        return response()->json([
            'status' => true,
            'data'   =>  $data,
            'labels' => $data->pluck('ngay_dang_ky'),
            'datasets' => [[
                'label' => 'Biểu đồ Khách Hàng Mới',
                'data' => $data->pluck('so_khach_hang_moi'),
                'backgroundColor' => $colors,
            ]]
        ]);
    }

    public function thongKeSuatChieu(Request $request)
    {
        $data = SuatChieu::whereDate('suat_chieus.ngay_chieu', '>=', $request->begin)
            ->whereDate('suat_chieus.ngay_chieu', '<=', $request->end)
            ->select('suat_chieus.ngay_chieu as ngay_chieu', DB::raw('COUNT(suat_chieus.id) as so_luong_suat_chieu'))
            ->groupBy('ngay_chieu')
            ->orderBy('ngay_chieu')
            ->get();

        $colors = [];
        foreach ($data->pluck('ngay_chieu') as $v) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF)); // random hex color
        }

        return response()->json([
            'status' => true,
            'data'   => $data,
            'labels' => $data->pluck('ngay_chieu'),
            'datasets' => [[
                'label' => 'Biểu đồ Suất Chiếu',
                'data' => $data->pluck('so_luong_suat_chieu'),
                'backgroundColor' => $colors,
            ]]
        ]);
    }


    public function thongKePhimDangChieu(Request $request)
    {
        $data = SuatChieu::join('phims', 'suat_chieus.id_phim', '=', 'phims.id')
            ->whereDate('suat_chieus.ngay_chieu', '>=', $request->begin)
            ->whereDate('suat_chieus.ngay_chieu', '<=', $request->end)
            ->where('phims.tinh_trang', 2)
            ->select(
                'suat_chieus.ngay_chieu as ngay_chieu',
                DB::raw('COUNT(DISTINCT suat_chieus.id_phim) as so_luong_phim_dang_chieu')
            )
            ->groupBy('suat_chieus.ngay_chieu')
            ->orderBy('suat_chieus.ngay_chieu')
            ->get();

        $colors = [];
        foreach ($data->pluck('ngay_chieu') as $v) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF)); // random hex color
        }

        return response()->json([
            'status' => true,
            'data'   => $data,
            'labels' => $data->pluck('ngay_chieu'),
            'datasets' => [[
                'label' => 'Biểu đồ Phim Đang Chiếu',
                'data' => $data->pluck('so_luong_phim_dang_chieu'),
                'backgroundColor' => $colors,
            ]]
        ]);
    }

    public function thongKeApVoucher(Request $request)
    {
        $data = DonHang::join('vouchers', 'don_hangs.id_voucher', '=', 'vouchers.id')
            ->whereDate('don_hangs.ngay_dat', '>=', $request->begin)
            ->whereDate('don_hangs.ngay_dat', '<=', $request->end)
            ->select(
                DB::raw('DATE(don_hangs.ngay_dat) as ngay'),
                DB::raw('COUNT(don_hangs.id) as so_lan_ap_dung')
            )
            ->groupBy('ngay')
            ->orderBy('ngay')
            ->get();

        $colors = [];
        foreach ($data->pluck('ngay') as $v) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF)); // random hex color
        }

        return response()->json([
            'status' => true,
            'data'   => $data,
            'labels' => $data->pluck('ngay'),
            'datasets' => [[
                'label' => 'Biểu đồ Voucher Sử Dụng',
                'data' => $data->pluck('so_lan_ap_dung'),
                'backgroundColor' => $colors,
            ]]
        ]);
    }

    public function thongKeDichVu(Request $request)
    {
        $data = ChiTietDichVu::join('don_hangs', 'chi_tiet_dich_vus.id_don_hang', '=', 'don_hangs.id')
            ->whereDate('don_hangs.ngay_dat', '>=', $request->begin)
            ->whereDate('don_hangs.ngay_dat', '<=', $request->end)
            ->select(
                DB::raw('DATE(don_hangs.ngay_dat) as ngay'),
                DB::raw('COUNT(chi_tiet_dich_vus.id) as tong_dich_vu_ban_ra'),
                DB::raw('SUM(don_hangs.is_thanh_toan) as dich_vu_da_thanh_toan')
            )
            ->groupBy('ngay')
            ->orderBy('ngay')
            ->get();

        $colors = [];
        foreach ($data->pluck('ngay') as $v) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF)); // random hex color
        }

        return response()->json([
            'status' => true,
            'data'   => $data,
            'labels' => $data->pluck('ngay'),
            'datasets' => [
                [
                    'label' => 'Tổng Dịch Vụ Bán Ra',
                    'data' => $data->pluck('tong_dich_vu_ban_ra'),
                    'backgroundColor' => $colors,
                ],
                [
                    'label' => 'Dịch Vụ Đã Thanh Toán',
                    'data' => $data->pluck('dich_vu_da_thanh_toan'),
                    'backgroundColor' => $colors,
                ]
            ]
        ]);
    }


    public function thongKeVeBanRa(Request $request)
    {
        $data = Ve::join('don_hangs', 'ves.id_don_hang', '=', 'don_hangs.id')
            ->whereDate('don_hangs.ngay_dat', '>=', $request->begin)
            ->whereDate('don_hangs.ngay_dat', '<=', $request->end)
            ->select(
                DB::raw('DATE(don_hangs.ngay_dat) as ngay'),
                DB::raw('COUNT(ves.id) as tong_so_ve'),
                DB::raw('SUM(don_hangs.is_thanh_toan) as so_ve_da_thanh_toan')
            )
            ->groupBy('ngay')
            ->orderBy('ngay')
            ->get();

        $colors = [];
        foreach ($data->pluck('ngay') as $v) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF)); // random hex color
        }

        return response()->json([
            'status' => true,
            'data'   => $data,
            'labels' => $data->pluck('ngay'),
            'datasets' => [
                [
                    'label' => 'Tổng Số Vé Bán Ra',
                    'data' => $data->pluck('tong_so_ve'),
                    'backgroundColor' => $colors,
                ],
                [
                    'label' => 'Số Vé Đã Thanh Toán',
                    'data' => $data->pluck('so_ve_da_thanh_toan'),
                    'backgroundColor' => $colors,
                ]
            ]
        ]);
    }


    public function thongKeChiTieuKhachHang(Request $request)
    {
        $data = DonHang::join('khach_hangs', 'don_hangs.id_khach_hang', '=', 'khach_hangs.id')
            ->whereDate('don_hangs.ngay_dat', '>=', $request->begin)
            ->whereDate('don_hangs.ngay_dat', '<=', $request->end)
            ->where('don_hangs.is_thanh_toan', 1)
            ->select(
                'khach_hangs.ho_va_ten',
                DB::raw('COUNT(don_hangs.id) as so_don_hang'),
                DB::raw('SUM(don_hangs.tien_thuc_nhan) as tong_chi_tieu')
            )
            ->groupBy('khach_hangs.ho_va_ten')
            ->orderBy('khach_hangs.ho_va_ten')
            ->get();

        $colors = [];
        foreach ($data->pluck('ho_va_ten') as $v) {
            $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF)); // random hex color
        }

        return response()->json([
            'status' => true,
            'data'   => $data,
            'labels' => $data->pluck('ho_va_ten'),
            'datasets' => [
                [
                    'label' => 'Tổng Chi Tiêu',
                    'data' => $data->pluck('tong_chi_tieu'),
                    'backgroundColor' => $colors,
                ]
            ]
        ]);
    }

    public function thongKeDonHangDoanhThu(Request $request)
{
    $data = DonHang::whereDate('ngay_dat', '>=', $request->begin)
        ->whereDate('ngay_dat', '<=', $request->end)
        ->select(
            DB::raw('DATE(ngay_dat) as ngay'),
            DB::raw('COUNT(id) as tong_don_hang'),
            DB::raw('SUM(tong_tien) as tong_tien'),
            DB::raw('SUM(tien_thuc_nhan) as tong_tien_thuc_nhan')
        )
        ->groupBy('ngay')
        ->orderBy('ngay')
        ->get();

    $colors = [];
    foreach ($data->pluck('ngay') as $v) {
        $colors[] = sprintf("#%06X", mt_rand(0, 0xFFFFFF)); // random hex color
    }

    return response()->json([
        'status' => true,
        'data'   => $data,
        'labels' => $data->pluck('ngay'),
        'datasets' => [
            [
                'label' => 'Tổng Tiền Thực Nhận',
                'data' => $data->pluck('tong_tien_thuc_nhan'),
                'backgroundColor' => $colors,
            ]
        ]
    ]);
}
}
