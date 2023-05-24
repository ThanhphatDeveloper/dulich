<?php

namespace Database\Seeders;

use App\Models\LoaiTour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoaiTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoaiTour::create(['loaitour'=>'Trong nước']);
        LoaiTour::create(['loaitour'=>'Ngoài nước']);
    }
}
