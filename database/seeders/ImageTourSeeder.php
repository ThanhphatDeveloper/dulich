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
        Tour::where('id',10)->first()->image_tour()->createMany([
            [
                'image'=>'img/korean/hanquoc1.jpg',
            ],
            [
                'image'=>'img/korean/hanquoc2.jpg',
            ],
            [
                'image'=>'img/korean/hanquoc3.jpg',
            ],
            [
                'image'=>'img/korean/hanquoc4.jpg',
            ],
            [
                'image'=>'img/korean/hanquoc5.jpg',
            ],
            [
                'image'=>'img/korean/hanquoc6.jpg',
            ],
            [
                'image'=>'img/korean/hanquoc7.jpg',
            ],
            [
                'image'=>'img/korean/hanquoc8.jpg',
            ],
            [
                'image'=>'img/korean/hanquoc9.jpg',
            ],
            [
                'image'=>'img/korean/hanquoc10.jpg',
            ],
            [
                'image'=>'img/korean/hanquoc11.jpg',
            ],
            [
                'image'=>'img/korean/hanquoc12.jpg',
            ],
        ]);
    }
}
