<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogGiaoDich extends Model
{
    protected $table = 'log_giao_diches';

    protected $fillable = [
        'refNo',
        'creditAmount',
        'description',
        'transactionDate',
        'code',
    ];
}
