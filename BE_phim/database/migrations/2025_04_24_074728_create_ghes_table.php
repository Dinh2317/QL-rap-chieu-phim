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
        Schema::create('ghes', function (Blueprint $table) {
            $table->id();
            $table->string('ten_ghe'); // Ví dụ: A1, B5, VIP1
            $table->string('gia_ghe'); 
            $table->integer('tinh_trang')->default(1);
            $table->integer('id_phong_chieu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ghes');
    }
};
