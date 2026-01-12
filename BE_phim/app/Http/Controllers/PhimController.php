<?php

namespace App\Http\Controllers;

use App\Models\Phim;
use Illuminate\Http\Request;

class PhimController extends Controller
{
    public function getData()
    {
        $data = Phim::get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function addData(Request $request)
    {
        Phim::create([
            'ten_phim'          => $request->ten_phim,
            'dao_dien'          => $request->dao_dien,
            'dien_vien'         => $request->dien_vien,
            'hinh_anh'          => $request->hinh_anh,
            'quoc_gia'          => $request->quoc_gia,
            'nha_san_xuat'      => $request->nha_san_xuat,
            'trailer'           => $request->trailer,
            'ngay_phat_hanh'    => $request->ngay_phat_hanh,
            'ngon_ngu'          => $request->ngon_ngu,
            'the_loai'          => $request->the_loai,
            'thoi_luong'        => $request->thoi_luong,
            'noi_dung'          => $request->noi_dung,
            'tinh_trang'        => $request->tinh_trang,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Thêm phim ' . $request->ten_phim . ' thành công',
        ]);
    }

    public function update(Request $request)
    {
        Phim::where('id', $request->id)->update([
            'ten_phim'          => $request->ten_phim,
            'dao_dien'          => $request->dao_dien,
            'dien_vien'         => $request->dien_vien,
            'hinh_anh'          => $request->hinh_anh,
            'quoc_gia'          => $request->quoc_gia,
            'nha_san_xuat'      => $request->nha_san_xuat,
            'trailer'           => $request->trailer,
            'ngay_phat_hanh'    => $request->ngay_phat_hanh,
            'ngon_ngu'          => $request->ngon_ngu,
            'the_loai'          => $request->the_loai,
            'thoi_luong'        => $request->thoi_luong,
            'noi_dung'          => $request->noi_dung,
            'tinh_trang'        => $request->tinh_trang,
        ]);

        return response()->json([
            'status'    => true,
            'message'   => 'Cập nhật phim ' . $request->ten_phim . ' thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        Phim::where('id', $request->id)->delete();

        return response()->json([
            'status'    => true,
            'message'   => 'Xóa phim thành công',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $phim = Phim::where('id', $request->id)->first();
        if ($phim->tinh_trang == Phim::DANG_CHIEU) {
            $phim->tinh_trang = Phim::NGUNG_CHIEU;
        } else if ($phim->tinh_trang == Phim::SAP_CHIEU) {
            $phim->tinh_trang = Phim::DANG_CHIEU;
        } else {
            $phim->tinh_trang = Phim::SAP_CHIEU;
        }
        $phim->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Thay đổi trạng thái phim thành công',
        ]);
    }

    public function getDataClientPhim()
    {
        $data = Phim::where('tinh_trang', '>', 0)->get();

        return response()->json([
            'status'    => true,
            'data'      => $data,
        ]);
    }
}
