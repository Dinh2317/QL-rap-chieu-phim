<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'vouchers';
    protected $fillable = [
        'ma_code',
        'thoi_gian_bat_dau',
        'thoi_gian_ket_thuc',
        'so_giam_gia',
        'so_tien_toi_da',
        'so_tien_giam_gia',
        'tinh_trang'
    ];
}
