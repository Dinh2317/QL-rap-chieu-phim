<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phim extends Model
{
    protected $table = 'phims';
    protected $fillable = [
        'ten_phim',
        'dao_dien',
        'dien_vien',
        'hinh_anh',
        'quoc_gia',
        'nha_san_xuat',
        'trailer',
        'ngay_phat_hanh',
        'ngon_ngu',
        'the_loai',
        'thoi_luong',
        'noi_dung',
        'tinh_trang',
    ];

    const NGUNG_CHIEU   = 0;
    const SAP_CHIEU     = 1;
    const DANG_CHIEU    = 2;
}
