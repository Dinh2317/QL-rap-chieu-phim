<?php

namespace App\Http\Controllers;

use App\Models\DichVu;
use Illuminate\Http\Request;

class DichVuController extends Controller
{
    public function getData()
    {
        $data = DichVu::all();
        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu thành công',
            'data' => $data
        ]);
    }

    public function addData(Request $request)
    {
        $data = DichVu::create([
            'ten_dich_vu'   => $request->ten_dich_vu,
            'hinh_anh'      => $request->hinh_anh,
            'gia'           => $request->gia,
            'mo_ta'         => $request->mo_ta,
            'tinh_trang'    => $request->tinh_trang
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm dịch vụ thành công',
            'data' => $data
        ]);
    }

    public function update(Request $request)
    {
        DichVu::where('id', $request->id)->update([
            'ten_dich_vu'   => $request->ten_dich_vu,
            'hinh_anh'      => $request->hinh_anh,
            'gia'           => $request->gia,
            'mo_ta'         => $request->mo_ta,
            'tinh_trang'    => $request->tinh_trang
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật dịch vụ thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        DichVu::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa dịch vụ thành công',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $dichvu = DichVu::where('id', $request->id)->first();
        $dichvu->tinh_trang = !$dichvu->tinh_trang;
        $dichvu->save();

        return response()->json([
            'status' => true,
            'message' => 'Thay đổi trạng thái dịch vụ thành công',
        ]);
    }

    public function getDataClientDichVu()
    {
        $data = DichVu::all();
        return response()->json([
            'data' => $data
        ]);
    }
}
