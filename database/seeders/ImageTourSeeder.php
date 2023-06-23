<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\ImageTour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ImageTour::factory(15)->create();
        Tour::where('id',2)->first()->image_tour()->createMany([
            [
                'image'=>'img/test.gif'
            ]
        ]);
    }
}
