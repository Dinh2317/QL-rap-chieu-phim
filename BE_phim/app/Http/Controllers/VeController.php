<?php

namespace App\Http\Controllers;

use App\Models\PhongChieu;
use App\Models\SuatChieu;
use App\Models\Ve;
use Illuminate\Http\Request;

class VeController extends Controller
{
    public function getData()
    {
        $ve = Ve::join('suat_chieus', 'suat_chieus.id', 'ves.id_suat_chieu')
            ->join('phims', 'phims.id', 'suat_chieus.id_phim')
            ->join('phong_chieus', 'phong_chieus.id', 'suat_chieus.id_phong_chieu')
            ->select('ves.*', 'phims.ten_phim', 'phong_chieus.ten_phong', 'suat_chieus.thoi_gian_bat_dau', 'suat_chieus.ngay_chieu')
            ->get();
        return response()->json([
            'data' => $ve
        ]);
    }

    public function addData(Request $request)
    {
        Ve::create([
            'ma_ve'             => $request->ma_ve,
            'gia_ve'            => $request->gia_ve,
            'id_don_hang'     => $request->id_don_hang,
            'id_suat_chieu'     => $request->id_suat_chieu,
            'ten_ghe'           => $request->ten_ghe,
            'tinh_trang'        => $request->tinh_trang
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm vé thành công',
        ]);
    }

    public function update(Request $request)
    {
        Ve::where('id', $request->id)->update([
            'ma_ve'             => $request->ma_ve,
            'gia_ve'            => $request->gia_ve,
            'id_don_hang'     => $request->id_don_hang,
            'id_suat_chieu'     => $request->id_suat_chieu,
            'ten_ghe'           => $request->ten_ghe,
            'tinh_trang'        => $request->tinh_trang
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật vé thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        Ve::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa vé thành công',
        ]);
    }


    public function getAllVe($id_suat_chieu)
    {
        $data = Ve::where('id_suat_chieu', $id_suat_chieu)->get();
        $phong_chieu = SuatChieu::where('suat_chieus.id', $id_suat_chieu)
            ->join('phong_chieus', 'phong_chieus.id', 'suat_chieus.id_phong_chieu')
            ->first();
        $phim = SuatChieu::where('suat_chieus.id', $id_suat_chieu)
            ->join('phims', 'phims.id', 'suat_chieus.id_phim')
            ->select('suat_chieus.*', 'phims.ten_phim', 'phims.ngon_ngu', 'phims.hinh_anh')
            ->first();
        if (count($data) > 0) {
            return response()->json([
                'status'    => true,
                'data'      => $data,
                'thong_tin_phim'      => $phim,
                'hang_ngang' => $phong_chieu->hang_ngang
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Không có vé cho suất chiếu này!!!',
            ]);
        }
    }


    public function soatVe(Request $request)
    {
        $ve = Ve::where('ma_ve', $request->noi_dung)
                ->join('don_hangs', 'don_hangs.id', 'ves.id_don_hang')
                ->join('suat_chieus', 'suat_chieus.id', 'ves.id_suat_chieu')
                ->join('phong_chieus', 'phong_chieus.id', 'suat_chieus.id_phong_chieu')
                ->join('phims', 'phims.id', 'suat_chieus.id_phim')
                ->where('don_hangs.is_thanh_toan', 1)
                ->select('*')
                ->first();
        if ($ve) {
            return response()->json([
                'status' =>  1,
                'data'   =>  $ve
            ]);
        } else {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Vé không tồn tại hoặc chưa thanh toán.'
            ]);
        }
    }
}
