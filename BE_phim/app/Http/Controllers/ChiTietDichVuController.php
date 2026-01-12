<?php

namespace App\Http\Controllers;

use App\Models\ChiTietDichVu;
use App\Models\DonHang;
use Illuminate\Http\Request;

class ChiTietDichVuController extends Controller
{
    public function getDataChiTietDichVu($id)
    {
        $data_dich_vu = DonHang::where('don_hangs.id', $id)
                        ->join('chi_tiet_dich_vus', 'don_hangs.id', 'chi_tiet_dich_vus.id_don_hang')
                        ->join('dich_vus', 'dich_vus.id', 'chi_tiet_dich_vus.id_dich_vu')
                        ->select('chi_tiet_dich_vus.*', 'dich_vus.ten_dich_vu', 'dich_vus.gia')
                        ->get();
        $data_ve = DonHang::where('don_hangs.id', $id)
                        ->join('ves', 'don_hangs.id', 'ves.id_don_hang')
                        ->join('suat_chieus', 'suat_chieus.id', 'ves.id_suat_chieu')
                        ->join('phims', 'phims.id', 'suat_chieus.id_phim')
                        ->select('ves.ten_ghe', 'ves.gia_ve', 'phims.ten_phim', 'suat_chieus.thoi_gian_bat_dau', 'suat_chieus.ngay_chieu')
                        ->get();
        return response()->json([
            'data_dich_vu' => $data_dich_vu,
            'data_ve' => $data_ve,
        ]);
    }

}
