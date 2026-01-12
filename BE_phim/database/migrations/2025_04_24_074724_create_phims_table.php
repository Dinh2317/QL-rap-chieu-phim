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
        Schema::create('phims', function (Blueprint $table) {
            $table->id();
            $table->string('ten_phim');
            $table->string('dao_dien')->nullable();
            $table->string('dien_vien')->nullable();
            $table->string('hinh_anh')->nullable();
            $table->string('quoc_gia')->nullable();
            $table->string('nha_san_xuat')->nullable();
            $table->string('trailer')->nullable();
            $table->date('ngay_phat_hanh')->nullable();
            $table->string('ngon_ngu')->nullable();
            $table->string('the_loai')->nullable();
            $table->integer('thoi_luong')->nullable(); // Tính bằng phút
            $table->longText('noi_dung')->nullable();
            $table->integer('tinh_trang')->default(1); // Ví dụ: 1 = Sắp chiếu, 2 = Đang chiếu, 0 = Ngừng chiếu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phims');
    }
};
