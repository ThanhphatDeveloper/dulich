<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageTourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tour::where('id',1)->first()->image_tour()->createMany([
            [
                'image'=>'Ảnh tour 1'
            ],
            [
                'image'=>'Ảnh tour 2'
            ]
        ]);
        Tour::where('id',2)->first()->image_tour()->createMany([
            [
                'image'=>'Ảnh tour 3'
            ],
            [
                'image'=>'Ảnh tour 4'
            ]
        ]);
    }
}
