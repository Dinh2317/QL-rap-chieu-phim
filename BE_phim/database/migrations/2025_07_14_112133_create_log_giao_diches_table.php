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
        Schema::create('log_giao_diches', function (Blueprint $table) {
            $table->id();
            $table->string("refNo")->nullable();
            $table->integer("creditAmount")->nullable();
            $table->string("description")->nullable();
            $table->string("transactionDate")->nullable();
            $table->string("code")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_giao_diches');
    }
};
