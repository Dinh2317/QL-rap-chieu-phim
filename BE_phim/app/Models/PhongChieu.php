<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhongChieu extends Model
{
    protected $table = 'phong_chieus';
    protected $fillable = ['ten_phong', 'hang_ngang', 'hang_doc', 'is_active', 'tinh_trang'];
}
