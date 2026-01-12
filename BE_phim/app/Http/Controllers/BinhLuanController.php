<?php

namespace App\Http\Controllers;

use App\Models\BinhLuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BinhLuanController extends Controller
{
    public function binhLuanPhim(Request $request)
    {

        $user = Auth::guard('sanctum')->user();

        BinhLuan::create([
            'id_khach_hang'     => $user->id,
            'id_phim'           => $request->id_phim,
            'noi_dung'          => $request->noi_dung_binh_luan,
            'is_hien_thi'       => 0,

        ]);

        return response()->json([
            'status'    =>  1,
            'message'   =>  'Bạn vừa thêm mới 1 bình luận cho phim.'
        ]);
    }

    public function getDataClientBinhLuan($id)
    {
        $data = BinhLuan::where('id_phim', $id)
            ->join('khach_hangs', 'khach_hangs.id', 'binh_luans.id_khach_hang')
            ->where('binh_luans.is_hien_thi', 1)
            ->select('binh_luans.*', 'khach_hangs.ho_va_ten', 'khach_hangs.avatar')
            ->get();
        return response()->json([
            'data'   =>  $data
        ]);
    }

    
    public function getData()
    {
        $data = BinhLuan::join('khach_hangs', 'khach_hangs.id', 'binh_luans.id_khach_hang')
            ->join('phims', 'binh_luans.id_phim', 'phims.id')
            ->select('binh_luans.*', 'khach_hangs.ho_va_ten', 'phims.ten_phim')
            ->orderBy('binh_luans.id', 'desc')
            ->get();
        return response()->json([
            'data' => $data
        ]);
    }
    public function doiTrangThai($id)
    {
        $binhluan = BinhLuan::where('id', $id)->first();
        if ($binhluan) {
            if ($binhluan->is_hien_thi == 0) {
                $binhluan->is_hien_thi = 1;
            } else {
                $binhluan->is_hien_thi = 0;
            }
            $binhluan->save();
            return response()->json([
                'status' => 1,
                'message' => 'Đổi trạng thái thành công!'

            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Bình luận chưa tồn tại!'

            ]);
        }
    }
}
