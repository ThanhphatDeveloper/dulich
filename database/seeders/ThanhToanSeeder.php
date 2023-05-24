<?php

namespace Database\Seeders;

use App\Models\ThanhToan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ThanhToanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ThanhToan::create(
            [
                'tenphuongthuc'=>'momo',
                'sotien'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'ten'=>'Phạm Hữu Trung',
                'ngaythanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1
            ]
        );
        ThanhToan::create(
            [
                'tenphuongthuc'=>'vnpay',
                'sotien'=>1000000,
                'mathanhtoan'=>Str::random(20),
                'ten'=>'Nguyễn Thành Phát',
                'ngaythanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1
            ]
        );
        ThanhToan::create(
            [
                'tenphuongthuc'=>'tiền mặt',
                'sotien'=>1250000,
                'mathanhtoan'=>Str::random(20),
                'ten'=>'Trần Văn A',
                'ngaythanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0
            ]
        );
    }
}
