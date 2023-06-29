<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            KhuyenMaiSeeder::class,
            ThanhToanSeeder::class,
            UserSeeder::class,
            BlogSeeder::class,
            LoaiTourSeeder::class,
            NhaCungCapSeeder::class,
            DiaDiemSeeder::class,
            ThoiGianTourSeeder::class,
            TourSeeder::class,
            DonHangSeeder::class,
            KhachHangSeeder::class,
            ImageTourSeeder::class,
            TourLienQuanSeeder::class,
        ]);
    }
}
