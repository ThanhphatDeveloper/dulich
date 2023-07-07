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
                'makhuyenmai'=>'',
                'mota'=>'',
                'mucgiam'=>0,
                'giatoithieu'=>0,
                'hansudung'=>0,
                'trangthai'=>0
            ],
        );
        KhuyenMai::create(
            [
                'makhuyenmai'=>'2023qFn6HUb26cMg170Vn33JSu0',
                'mota'=>'Mô tả khuyến mãi 1',
                'mucgiam'=>500000,
                'giatoithieu'=>1000000,
                'hansudung'=>4,
                'trangthai'=>1
            ],
        );
        KhuyenMai::create(
            [
                'makhuyenmai'=>'2023Pmh6MDC26Y6017QFL33hqY19',
                'mota'=>'Mô tả khuyến mãi 2',
                'mucgiam'=>600000,
                'giatoithieu'=>1200000,
                'hansudung'=>5,
                'trangthai'=>1
            ]
        );
    }
}
