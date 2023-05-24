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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('tentour');
            $table->bigInteger('gia');
            $table->string('mota');
            $table->datetime('ngaykhoihanh');
            $table->string('diemkhoihanh');
            $table->string('diemketthuc');
            $table->string('thoigian');
            $table->string('phuongtien');
            $table->boolean('trangthai');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
