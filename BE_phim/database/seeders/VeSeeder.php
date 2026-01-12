<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VeSeeder extends Seeder
{
    public function run(): void
    {
        $ves = [];

        // Xóa dữ liệu cũ trước khi chèn mới
        DB::table('ves')->truncate();
        DB::table('ves')->delete();
        DB::table('ves')->insert($ves);
    }
}
