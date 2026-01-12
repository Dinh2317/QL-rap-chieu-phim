<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suat_chieus', function (Blueprint $table) {
            $table->id();
            $table->integer('id_phim');
            $table->integer('id_phong_chieu');
            $table->date('ngay_chieu');
            $table->time('thoi_gian_bat_dau');
            $table->time('thoi_gian_ket_thuc'); // Có thể tính toán tự động dựa vào thời lượng phim
            $table->integer('tinh_trang')->default(1); // 1 = Sắp chiếu, 2 = Đang chiếu, 3 = Đã chiếu, 0 = Hủy
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suat_chieus');
    }
};
