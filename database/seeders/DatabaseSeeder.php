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
            DonHangSeeder::class,
            UserSeeder::class,
            KhachHangSeeder::class,
            BlogSeeder::class,
            LoaiTourSeeder::class,
            NhaCungCapSeeder::class,
            TourSeeder::class,
            ImageTourSeeder::class,
            TourLienQuanSeeder::class,
            DiaDiemSeeder::class,
            LichTrinhSeeder::class,
        ]);
    }
}
