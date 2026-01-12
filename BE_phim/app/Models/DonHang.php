<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'don_hangs';
    protected $fillable = [
        'id_khach_hang',
        'ma_don_hang',
        'ngay_dat',
        'tien_thuc_nhan',
        'tong_tien',
        'giam_gia',
        'is_thanh_toan',
        'id_voucher'
    ];
}
