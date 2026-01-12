<?php

namespace App\Http\Controllers;

use App\Models\Ghe;
use App\Models\PhongChieu;
use Illuminate\Http\Request;

class PhongChieuController extends Controller
{
    public function getData()
    {
        $data = PhongChieu::all();
        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu thành công',
            'data' => $data
        ]);
    }

    public function addData(Request $request)
    {
        $data = PhongChieu::create([
            'ten_phong'     => $request->ten_phong,
            'hang_ngang'    => $request->hang_ngang,
            'hang_doc'      => $request->hang_doc,
            'tinh_trang'    => $request->tinh_trang
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Thêm phòng chiếu ' . $request->ten_phong . ' thành công',
            'data'      => $data
        ]);
    }

    public function update(Request $request)
    {
        PhongChieu::where('id', $request->id)->update([
            'ten_phong'     => $request->ten_phong,
            'hang_ngang'    => $request->hang_ngang,
            'hang_doc'      => $request->hang_doc,
            'tinh_trang'    => $request->tinh_trang
        ]);
        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật phòng chiếu ' . $request->ten_phong . ' thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        PhongChieu::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa phòng chiếu thành công',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $phong_chieu = PhongChieu::where('id', $request->id)->first();
        $phong_chieu->tinh_trang = !$phong_chieu->tinh_trang;
        $phong_chieu->save();

        return response()->json([
            'status' => true,
            'message' => 'Thay đổi trạng thái phòng chiếu thành công',
        ]);
    }

    public function taoGheAuto(Request $request)
    {
        Ghe::where('id_phong_chieu', $request->id)->delete();
        for ($i = 0; $i < $request->hang_doc; $i++) {
            for ($j = 0; $j < $request->hang_ngang; $j++) {
                $ten_ghe = chr($i + 65) . ($j + 1);
                $gia_ghe = rand(8, 18) * 50;

                Ghe::create([
                    'ten_ghe'       => $ten_ghe,
                    'gia_ghe'       => $gia_ghe,
                    'tinh_trang'    => 1,
                    'id_phong_chieu' => $request->id,
                ]);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Tạo ghế tự động cho phòng chiếu thành công',
        ]);
    }
}
