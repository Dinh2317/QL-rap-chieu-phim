<?php

namespace App\Http\Controllers;

use App\Models\Ghe;
use Illuminate\Http\Request;

class GheController extends Controller
{
    public function getData()
    {
        $ghe = Ghe::join('phong_chieus', 'phong_chieus.id', 'ghes.id_phong_chieu')
            ->select('ghes.*', 'phong_chieus.ten_phong')
            ->get();
        return response()->json([
            'success' => true,
            'message' => 'Lấy dữ liệu thành công',
            'data' => $ghe
        ]);
    }

    public function addData(Request $request)
    {
        Ghe::create([
            'ten_ghe'           => $request->ten_ghe,
            'gia_ghe'           => $request->gia_ghe,
            'tinh_trang'        => $request->tinh_trang,
            'id_phong_chieu'    => $request->id_phong_chieu
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm ghế thành công',
        ]);
    }

    public function update(Request $request)
    {
        Ghe::where('id', $request->id)->update([
            'ten_ghe'           => $request->ten_ghe,
            'gia_ghe'           => $request->gia_ghe,
            'tinh_trang'        => $request->tinh_trang,
            'id_phong_chieu'    => $request->id_phong_chieu
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật ghế thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        Ghe::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa ghế thành công',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $ghe = Ghe::where('id', $request->id)->first();
        $ghe->tinh_trang = !$ghe->tinh_trang;
        $ghe->save();

        return response()->json([
            'status' => true,
            'message' => 'Thay đổi trạng thái ghế thành công',
        ]);
    }
}
