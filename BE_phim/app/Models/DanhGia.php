<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    protected $table = 'danh_gias';
    protected $fillable = ['id_khach_hang', 'id_ve', 'so_sao', 'noi_dung', 'tinh_trang'];
}
