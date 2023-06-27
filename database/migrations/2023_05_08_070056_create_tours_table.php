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
            $table->longText('mota');
            $table->datetime('ngaykhoihanh');
            $table->string('phuongtien');
            $table->string('avatar');
            $table->string('imagelarge');
            $table->boolean('trangthai');
            $table->datetime('thoigianxoa')->nullable()->default(null);
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
