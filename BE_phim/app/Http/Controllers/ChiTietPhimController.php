<?php

namespace App\Http\Controllers;

use App\Models\Phim;
use App\Models\SuatChieu;
use Illuminate\Http\Request;

class ChiTietPhimController extends Controller
{
    public function getDataPhim(Request $request)
    {
        $data_phim = Phim::where('id', $request->id)->first();

        $suat_chieu = SuatChieu::where('id_phim', $request->id)
            ->where('tinh_trang', 1) // nếu cần lọc chỉ suất chiếu đang hoạt động
            ->get();

        $list_phim_khac = Phim::where('id', '!=', $request->id)->get();

        if ($data_phim) {
            return response()->json([
                'status'            => true,
                'data_phim'         => $data_phim,
                'data_suat_chieu'   => $suat_chieu,
                'list_phim_khac'     => $list_phim_khac
            ]);
        }
        return response()->json([
            'status'     =>  false,
            'message'    =>  "Không tồn tại phim này!!!"
        ]);
    }
}
