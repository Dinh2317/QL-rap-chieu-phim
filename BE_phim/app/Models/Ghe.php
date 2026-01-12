<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ghe extends Model
{
    protected $table = 'ghes';
    protected $fillable = [
        'ten_ghe',
        'gia_ghe',
        'tinh_trang',
        'id_phong_chieu'
    ];
}
