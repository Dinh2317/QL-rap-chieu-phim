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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->integer('id_khach_hang');
            $table->string('ma_don_hang')->unique();
            $table->dateTime('ngay_dat');
            $table->integer('tien_thuc_nhan');
            $table->integer('tong_tien');
            $table->integer('giam_gia');
            $table->integer('is_thanh_toan');
            $table->integer('id_voucher')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
