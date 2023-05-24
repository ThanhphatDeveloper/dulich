<?php

namespace Database\Seeders;

use App\Models\KhuyenMai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KhuyenMaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KhuyenMai::create(
            [
                'makhuyenmai'=>Str::random(10),
                'mota'=>'Mô tả khuyến mãi test 1',
                'mucgiam'=>500000,
                'giatoithieu'=>1000000,
                'hansudung'=>4,
                'trangthai'=>1
            ],
        );
        KhuyenMai::create(
            [
                'makhuyenmai'=>Str::random(10),
                'mota'=>'Mô tả khuyến mãi test 2',
                'mucgiam'=>600000,
                'giatoithieu'=>1200000,
                'hansudung'=>5,
                'trangthai'=>1
            ]
        );
    }
}
