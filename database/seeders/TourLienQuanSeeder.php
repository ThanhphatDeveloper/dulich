<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourLienQuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Blog::where('id',1)->first()->tour_lien_quan()->createMany([
            [
                'trangthai'=>1,
                'tour_id'=>1
            ],
            [
                'trangthai'=>1,
                'tour_id'=>1
            ]
        ]);
        Blog::where('id',2)->first()->tour_lien_quan()->createMany([
            [
                'trangthai'=>1,
                'tour_id'=>2
            ],
            [
                'trangthai'=>1,
                'tour_id'=>2
            ]
        ]);
    }
}
