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
            $table->string('tenphuongthuctt')->default('');
            $table->bigInteger('tienthanhtoan')->default(0);
            $table->string('mathanhtoan')->nullable()->default('');
            $table->string('tenthanhtoan')->default('');
            $table->datetime('thoigianthanhtoan')->nullable();
            $table->boolean('trangthai')->default(1);
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
        Schema::dropIfExists('thanh_toans');
    }
};
