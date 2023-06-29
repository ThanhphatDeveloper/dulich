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
        Schema::table('tours', function(Blueprint $table){
            $table->foreignId('loai_tour_id')->constrained('loai_tours');
            $table->foreignId('dia_diem_khoi_hanh_id')->constrained('dia_diems');
            $table->foreignId('dia_diem_ket_thuc_id')->constrained('dia_diems');
            $table->foreignId('nha_cung_cap_id')->constrained('nha_cung_caps');
            $table->foreignId('thoi_gian_id')->constrained('thoi_gian_tours');
        });

        Schema::table('blogs', function(Blueprint $table){
            $table->foreignId('user_id')->constrained('users');
        });

        Schema::table('tour_lien_quans', function(Blueprint $table){
            $table->foreignId('blog_id')->constrained('blogs');
            $table->foreignId('tour_id')->default(0)->constrained('tours');
        });

        Schema::table('khach_hangs', function(Blueprint $table){
            $table->foreignId('don_hang_id')->constrained('don_hangs');
        });

        Schema::table('image_tours', function(Blueprint $table){
            $table->foreignId('tour_id')->default(0)->constrained('tours');
        });

        Schema::table('don_hangs', function(Blueprint $table){
            $table->foreignId('khuyen_mai_id')->nullable()->default(null)->constrained('khuyen_mais');
            $table->foreignId('thanh_toan_id')->default(0)->constrained('thanh_toans');
            $table->foreignId('tour_id')->default(0)->constrained('tours');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
