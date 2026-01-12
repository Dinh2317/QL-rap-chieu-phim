<?php

namespace App\Http\Controllers;

use App\Models\ChucVu;
use Illuminate\Http\Request;

class ChucVuController extends Controller
{
    public function getData()
    {
        $data = ChucVu::all();
        return response()->json([
            'data' => $data
        ]);
    }

    public function addData(Request $request)
    {
        ChucVu::create([
            'ten_chuc_vu'   => $request->ten_chuc_vu,
            'slug_chuc_vu'  => $request->slug_chuc_vu,
            'tinh_trang'    => $request->tinh_trang,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm chức vụ thành công',
        ]);
    }

    public function update(Request $request)
    {
        ChucVu::where('id', $request->id)->update([
            'ten_chuc_vu'   => $request->ten_chuc_vu,
            'slug_chuc_vu'  => $request->slug_chuc_vu,
            'tinh_trang'    => $request->tinh_trang,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật chức vụ thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        ChucVu::where('id', $request->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Xóa chức vụ thành công',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $chucVu = ChucVu::where('id', $request->id)->first();

        $chucVu->tinh_trang = !$chucVu->tinh_trang;
        $chucVu->save();

        return response()->json([
            'status' => true,
            'message' => 'Thay đổi trạng thái thành công',
        ]);
    }
}
