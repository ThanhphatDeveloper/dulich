<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::where('id',1)->first()->blog()->createMany([
            [
                'tieude'=>'Tiêu đề blog 1',
                'noidung'=>'Nội dung blog 1',
                'anhdaidien'=>'Ảnh đại diện blog 1',
                'trangthai'=>1,
            ],
            [
                'tieude'=>'Tiêu đề blog 2',
                'noidung'=>'Nội dung blog 2',
                'anhdaidien'=>'Ảnh đại diện blog 2',
                'trangthai'=>0,
            ]
        ]);
        User::where('id',2)->first()->blog()->createMany([
            [
                'tieude'=>'Tiêu đề blog 3',
                'noidung'=>'Nội dung blog 3',
                'anhdaidien'=>'Ảnh đại diện blog 3',
                'trangthai'=>1,
            ],
            [
                'tieude'=>'Tiêu đề blog 4',
                'noidung'=>'Nội dung blog 4',
                'anhdaidien'=>'Ảnh đại diện blog 4',
                'trangthai'=>1,
            ]
        ]);
    }
}
