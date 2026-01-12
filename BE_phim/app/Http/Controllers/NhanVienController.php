<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NhanVienController extends Controller
{
    public function getData()
    {
        $data = NhanVien::join('chuc_vus', 'chuc_vus.id', 'nhan_viens.id_chuc_vu')
            ->select('nhan_viens.*', 'chuc_vus.ten_chuc_vu')
            ->get();

        return response()->json([
            'data' => $data
        ]);
    }

    public function addData(Request $request)
    {
        NhanVien::create([
            'email'         => $request->email,
            'ho_va_ten'     => $request->ho_va_ten,
            'password'      => $request->password,
            're_password'   => $request->re_password,
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi'       => $request->dia_chi,
            'ngay_sinh'     => $request->ngay_sinh,
            'tinh_trang'    => $request->tinh_trang,
            'id_chuc_vu'    => $request->id_chuc_vu
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm nhân viên ' . $request->ho_va_ten . ' thành công',
        ]);
    }

    public function update(Request $request)
    {
        NhanVien::where('id', $request->id)->update([
            'email'         => $request->email,
            'ho_va_ten'     => $request->ho_va_ten,
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi'       => $request->dia_chi,
            'ngay_sinh'     => $request->ngay_sinh,
            'tinh_trang'    => $request->tinh_trang,
            'id_chuc_vu'    => $request->id_chuc_vu
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật nhân viên ' . $request->ho_va_ten . ' thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        NhanVien::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa nhân viên thành công',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $nhan_vien = NhanVien::where('id', $request->id)->first();
        $nhan_vien->tinh_trang = !$nhan_vien->tinh_trang;
        $nhan_vien->save();

        return response()->json([
            'status' => true,
            'message' => 'Thay đổi trạng thái nhân viên thành công',
        ]);
    }


    public function dangNhap(Request $request)
    {
        $check = NhanVien::where('email', $request->email)
            ->where('password', $request->password)->first();
        if ($check) {
            return response()->json([
                'status' => true,
                'message' => 'Đăng nhập thành công',
                'token' => $check->createToken('key_admin')->plainTextToken
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Tài khoản sai email hoặc password',
            ]);
        }
    }

    public function checkAdmin()
    {
        $user = Auth::guard('sanctum')->user();
        if ($user){
            return response()->json([
                'status' => true,
                'ho_ten' => $user->ho_va_ten,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Bạn không có quyền truy cập.',
            ]);
        }
    }
}
