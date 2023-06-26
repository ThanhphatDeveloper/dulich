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
                'songay'=>3,
                'sodem'=>2,//1
            ],
        );
        ThoiGianTour::create(
            [
                'songay'=>10,
                'sodem'=>9,//2
            ],
        );
        ThoiGianTour::create(
            [
                'songay'=>12,
                'sodem'=>11,//3
            ],
        );
        ThoiGianTour::create(
            [
                'songay'=>5,
                'sodem'=>4,//4
            ],
        );
        ThoiGianTour::create(
            [
                'songay'=>7,
                'sodem'=>6,//5
            ],
        );
        ThoiGianTour::create(
            [
                'songay'=>9,
                'sodem'=>8,//6
            ],
        );
        ThoiGianTour::create(
            [
                'songay'=>6,
                'sodem'=>5,//7
            ],
        );
        ThoiGianTour::create(
            [
                'songay'=>5,
                'sodem'=>4,//8
            ],
        );
    }
}
