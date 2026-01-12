<?php

use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\ChiTietBaiVietController;
use App\Http\Controllers\ChiTietDichVuController;
use App\Http\Controllers\ChiTietPhimController;
use App\Http\Controllers\ChucNangController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\PhongChieuController;
use App\Http\Controllers\DichVuController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\GheController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\SuatChieuController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\VeController;
use App\Http\Controllers\VoucherController;
use Illuminate\Support\Facades\Route;

// =========================================================
// ======================= ADMIN ==========================
// =========================================================
Route::post('/admin/dang-nhap', [NhanVienController::class, 'dangNhap']);
Route::get('/admin/check-token', [NhanVienController::class, 'checkAdmin']);

Route::prefix('admin')->group(function () {
    // PHAN QUYEN
    Route::get('/chuc-nang/get-data', [ChucNangController::class, 'getData']);


    // NHAN VIEN
    Route::get('/nhan-vien/get-data', [NhanVienController::class, 'getData']);
    Route::post('/nhan-vien/add-data', [NhanVienController::class, 'addData']);
    Route::post('/nhan-vien/update', [NhanVienController::class, 'update']);
    Route::post('/nhan-vien/delete', [NhanVienController::class, 'destroy']);
    Route::post('/nhan-vien/change-status', [NhanVienController::class, 'changeStatus']);

    // KHACH HANG
    Route::get('/khach-hang/get-data', [KhachHangController::class, 'getData']);
    Route::post('/khach-hang/search', [KhachHangController::class, 'search']);
    Route::post('/khach-hang/add-data', [KhachHangController::class, 'addData']);
    Route::post('/khach-hang/update', [KhachHangController::class, 'update']);
    Route::post('/khach-hang/delete', [KhachHangController::class, 'destroy']);
    Route::post('/khach-hang/change-status', [KhachHangController::class, 'changeStatus']);

    // CHUC VU
    Route::get('/chuc-vu/get-data', [ChucVuController::class, 'getData']);
    Route::post('/chuc-vu/add-data', [ChucVuController::class, 'addData']);
    Route::post('/chuc-vu/update', [ChucVuController::class, 'update']);
    Route::post('/chuc-vu/delete', [ChucVuController::class, 'destroy']);
    Route::post('/chuc-vu/change-status', [ChucVuController::class, 'changeStatus']);

    // PHIM
    Route::get('/phim/get-data', [PhimController::class, 'getData']);
    Route::post('/phim/add-data', [PhimController::class, 'addData']);
    Route::post('/phim/update', [PhimController::class, 'update']);
    Route::post('/phim/delete', [PhimController::class, 'destroy']);
    Route::post('/phim/change-status', [PhimController::class, 'changeStatus']);

    // PHONG CHIEU
    Route::get('/phong-chieu/get-data', [PhongChieuController::class, 'getData']);
    Route::post('/phong-chieu/add-data', [PhongChieuController::class, 'addData']);
    Route::post('/phong-chieu/update', [PhongChieuController::class, 'update']);
    Route::post('/phong-chieu/delete', [PhongChieuController::class, 'destroy']);
    Route::post('/phong-chieu/change-status', [PhongChieuController::class, 'changeStatus']);
    Route::post('/phong-chieu/tao-ghe-auto', [PhongChieuController::class, 'taoGheAuto']);

    // SUAT CHIEU
    Route::get('/suat-chieu/get-data', [SuatChieuController::class, 'getData']);
    Route::post('/suat-chieu/add-data', [SuatChieuController::class, 'addData']);
    Route::post('/suat-chieu/update', [SuatChieuController::class, 'update']);
    Route::post('/suat-chieu/delete', [SuatChieuController::class, 'destroy']);
    Route::post('/suat-chieu/change-status', [SuatChieuController::class, 'changeStatus']);
    Route::post('/suat-chieu/tao-ve-auto', [SuatChieuController::class, 'taoVeAuto']);

    // DICH VU
    Route::get('/dich-vu/get-data', [DichVuController::class, 'getData']);
    Route::post('/dich-vu/add-data', [DichVuController::class, 'addData']);
    Route::post('/dich-vu/update', [DichVuController::class, 'update']);
    Route::post('/dich-vu/delete', [DichVuController::class, 'destroy']);
    Route::post('/dich-vu/change-status', [DichVuController::class, 'changeStatus']);

    // VOUCHER
    Route::get('/voucher/get-data', [VoucherController::class, 'getData']);
    Route::post('/voucher/add-data', [VoucherController::class, 'addData']);
    Route::post('/voucher/update', [VoucherController::class, 'update']);
    Route::post('/voucher/delete', [VoucherController::class, 'destroy']);
    Route::post('/voucher/change-status', [VoucherController::class, 'changeStatus']);

    // VE
    Route::get('/ve/get-data', [VeController::class, 'getData']);
    Route::post('/ve/add-data', [VeController::class, 'addData']);
    Route::post('/ve/update', [VeController::class, 'update']);
    Route::post('/ve/delete', [VeController::class, 'destroy']);
    Route::post('/ve/soat-ve', [VeController::class, 'soatVe']);

    // GHE
    Route::get('/ghe/get-data', [GheController::class, 'getData']);
    Route::post('/ghe/add-data', [GheController::class, 'addData']);
    Route::post('/ghe/update', [GheController::class, 'update']);
    Route::post('/ghe/delete', [GheController::class, 'destroy']);
    Route::post('/ghe/change-status', [GheController::class, 'changeStatus']);

    // BAI VIET
    Route::get('/bai-viet/get-data', [BaiVietController::class, 'getData']);
    Route::post('/bai-viet/add-data', [BaiVietController::class, 'addData']);
    Route::post('/bai-viet/update', [BaiVietController::class, 'update']);
    Route::post('/bai-viet/delete', [BaiVietController::class, 'destroy']);
    Route::post('/bai-viet/change-status', [BaiVietController::class, 'changeStatus']);

    // THONG KE
    Route::post('/thong-ke/khach-hang-chi-tieu', [ThongKeController::class, 'thongKeChiTieuKhachHang']);
    Route::post('/thong-ke/khach-hang-dang-ky', [ThongKeController::class, 'thongKeKHMoi']);
    Route::post('/thong-ke/suat-chieu', [ThongKeController::class, 'thongKeSuatChieu']);
    Route::post('/thong-ke/phim-dang-chieu', [ThongKeController::class, 'thongKePhimDangChieu']);
    Route::post('/thong-ke/ap-voucher', [ThongKeController::class, 'thongKeApVoucher']);
    Route::post('/thong-ke/ve-ban', [ThongKeController::class, 'thongKeVeBanRa']);
    Route::post('/thong-ke/dich-vu', [ThongKeController::class, 'thongKeDichVu']);
    Route::post('/thong-ke/don-hang', [ThongKeController::class, 'thongKeDonHangDoanhThu']);

    // DON HANG
    Route::get('/don-hang/get-data', [DonHangController::class, 'getData']);
    Route::post('/don-hang/loc-thong-tin', [DonHangController::class, 'locThongTin']);
    Route::get('/chi-tiet-dich-vu/{id}', [ChiTietDichVuController::class, 'getDataChiTietDichVu']);
    Route::get('/xoa-don-hang/{id}', [DonHangController::class, 'xoaDonHang']);

    // IN VE
    Route::post('/in-ve/get-phim', [DonHangController::class, 'getPhimByHoaDon']);

    // BINH LUAN
    Route::get('/binh-luan/get-data', [BinhLuanController::class, 'getData']);
    Route::get('/binh-luan/doi-trang-thai/{id}', [BinhLuanController::class, 'doiTrangThai']);


});



// =========================================================
// ======================= CLIENT ==========================
// =========================================================
Route::post('/client/dang-nhap', [KhachHangController::class, 'dangNhap']);
Route::post('/client/dang-ky', [KhachHangController::class, 'dangKy']);
Route::post('/client/quen-mat-khau', [KhachHangController::class, 'quenMatKhau']);
Route::post('/client/dat-lai-mat-khau', [KhachHangController::class, 'datLaiMatKhau']);
Route::post('/client/kich-hoat', [KhachHangController::class, 'kichHoat']);
Route::get('/client/check-token', [KhachHangController::class, 'checkClient']);
Route::get('/client/thong-tin', [KhachHangController::class, 'thongTinNguoiDung']);
Route::post('/client/doi-mat-khau', [KhachHangController::class, 'doiMatKhau']);

Route::prefix('client')->group(function () {

    // TRANG CHU
    Route::get('/home-page', [HomePageController::class, 'homepageData']);

    // PHIM
    Route::get('/phim/get-data', [PhimController::class, 'getDataClientPhim']);
    Route::get('/dich-vu/get-data', [DichVuController::class, 'getDataClientDichVu']);
    Route::post('/ap-voucher', [VoucherController::class, 'findVoucher']);

    // DAT VE
    Route::get('/dat-ve/{id_suat_chieu}', [VeController::class, 'getAllVe']);
    Route::post('/dat-ve/thanh-toan', [DonHangController::class, 'thanhToan']);

    // BINH LUAN
    Route::post('/chi-tiet-phim/binh-luan', [BinhLuanController::class, 'binhLuanPhim']);
    Route::get('/chi-tiet-phim/binh-luan/get-data/{id}', [BinhLuanController::class, 'getDataClientBinhLuan']);

    // CHI TIET PHIM
    Route::post('/chi-tiet-phim/get-data', [ChiTietPhimController::class, 'getDataPhim']);
    // CHI TIET BAI VIET
    Route::post('/chi-tiet-bai-viet/get-data', [ChiTietBaiVietController::class, 'getDataBaiViet']);
});



Route::get('/test-mail', [TestController::class, 'testMail']);
Route::get('/auto', [DonHangController::class, 'autoGiaoDich']);
