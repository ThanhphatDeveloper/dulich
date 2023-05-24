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
        Schema::create('thanh_toans', function (Blueprint $table) {
            $table->id();
            $table->string('tenphuongthuc')->default('');
            $table->bigInteger('sotien')->default(0);
            $table->string('mathanhtoan')->nullable()->default('');
            $table->string('ten')->default('');
            $table->datetime('ngaythanhtoan')->nullable();
            $table->boolean('trangthai')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanh_toans');
    }
};
