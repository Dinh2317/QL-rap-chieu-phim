<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use Illuminate\Http\Request;

class BaiVietController extends Controller
{
    public function getData()
    {
        $data = BaiViet::all();
        return response()->json([
            'data' => $data
        ]);
    }

    public function addData(Request $request)
    {
        BaiViet::create([
            'tieu_de'       =>$request->tieu_de,
            'mo_ta_ngan'    =>$request->mo_ta_ngan,
            'noi_dung'      =>$request->noi_dung,
            'hinh_anh'      =>$request->hinh_anh,
            'tag'           =>$request->tag,
            'tinh_trang'    =>$request->tinh_trang,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm bài viết thành công',
        ]);
    }

    public function update(Request $request)
    {
        BaiViet::where('id', $request->id)->update([
            'tieu_de'       =>$request->tieu_de,
            'mo_ta_ngan'    =>$request->mo_ta_ngan,
            'noi_dung'      =>$request->noi_dung,
            'hinh_anh'      =>$request->hinh_anh,
            'tag'           =>$request->tag,
            'tinh_trang'    =>$request->tinh_trang,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật bài viết thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        BaiViet::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa bài viết thành công',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $baiViet = BaiViet::where('id', $request->id)->first();
        $baiViet->tinh_trang = !$baiViet->tinh_trang;
        $baiViet->save();

        return response()->json([
            'status' => true,
            'message' => 'Thay đổi trạng thái bài viết thành công',
        ]);
    }
}
