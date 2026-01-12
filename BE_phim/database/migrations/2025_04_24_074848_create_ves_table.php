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
        Schema::create('ves', function (Blueprint $table) {
            $table->id();
            $table->string('ma_ve')->unique(); // Mã vé duy nhất
            $table->integer('gia_ve'); // Giá vé tại thời điểm mua
            $table->integer('id_don_hang'); // Thêm khóa ngoại đến đơn hàng
            $table->integer('id_suat_chieu');
            $table->string('ten_ghe'); // Mã vé duy nhất
            $table->integer('tinh_trang')->default(1); // 1: Chua thanh toan; 2: Da thanh toan, 0: Da huy
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ves');
    }
};
