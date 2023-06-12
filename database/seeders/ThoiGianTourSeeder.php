<?php

namespace Database\Seeders;

use App\Models\ThoiGianTour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ThoiGianTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThoiGianTour::create(
            [
                'songay'=>4,
                'sodem'=>3,
            ],
        );
        ThoiGianTour::create(
            [
                'songay'=>6,
                'sodem'=>5,
            ],
        );
    }
}
