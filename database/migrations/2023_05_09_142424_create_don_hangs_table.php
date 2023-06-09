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
            $table->string('ten')->default('');
            $table->string('email')->default('');
            $table->string('sdt')->default('');
            $table->datetime('thoigiankhoihanh');
            $table->bigInteger('sokhach');
            $table->datetime('ngaydat');
            $table->bigInteger('tongtien');
            $table->string('tenphuongthuctt')->default('');
            $table->bigInteger('tienthanhtoan')->default(0);
            $table->string('mathanhtoan')->nullable()->default('');
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
        Schema::dropIfExists('don_hangs');
    }
};
