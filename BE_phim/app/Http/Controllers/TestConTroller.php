<?php

namespace App\Http\Controllers;

use App\Mail\MasterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class TestController extends Controller
{
    public function testMail()
    {
        $key = Str::uuid();
        $tieu_de = "Xác nhận đặt vé";
        $view = "xacNhanThanhToan";
        $noi_dung['ten_phim'] = "ABC";
        $noi_dung['ngay_chieu'] = "20-07-2025";
        $noi_dung['gio_chieu'] = "12:00";
        $noi_dung['ds_ve']         = collect([
            (object)["ten_ghe" => "A13", "gia_ve" => 30000],
            (object)["ten_ghe" => "A14", "gia_ve" => 35000],
            (object)["ten_ghe" => "A15", "gia_ve" => 55000],
        ]);
        $noi_dung['ds_dv']         = collect([
            (object)["ten_dich_vu" => "Bắp rang", "gia_ve" => 30000],
            (object)["ten_dich_vu" => "Nước", "gia_ve" => 35000],
        ]);
        $noi_dung['ma_giam_gia'] = 'bba';
        $noi_dung['tien_giam_gia'] = 500000;
        $noi_dung['tam_tinh'] = 2500000;
        $noi_dung['so_tien'] = $noi_dung['tam_tinh'] - $noi_dung['tien_giam_gia'];
        $noi_dung['ma_don_hang'] = 'bba';
        $noi_dung['link_qr_code'] = 'https://img.vietqr.io/image/VIB-907889999-compact.png?amount=' . $noi_dung['so_tien'] .'&addInfo=' . $noi_dung['ma_don_hang'];

        Mail::to('docamtuyen2004@gmail.com')->send(new MasterMail($tieu_de, $view, $noi_dung));
    }
}
