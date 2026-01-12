<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    protected $table = 'binh_luans';

    protected $fillable = [
        'id_khach_hang',
        'id_phim',
        'noi_dung',
        'is_hien_thi'
    ];
}
