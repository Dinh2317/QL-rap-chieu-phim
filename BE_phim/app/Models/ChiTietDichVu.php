<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietDichVu extends Model
{
    protected $table = 'chi_tiet_dich_vus';
    protected $fillable = ['id_don_hang', 'id_dich_vu', 'don_gia', 'ghi_chu'];
}
