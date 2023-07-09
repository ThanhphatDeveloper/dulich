<?php

namespace Database\Seeders;

use App\Models\DonHang;
use App\Models\KhachHang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KhachHang::create(
            [
                'hoten'=>'Phạm Hữu Trung',
                'gioitinh'=>'Nam',
                'sdt'=>'0345774006',
                'email'=>'0306201498@caothang.edu.vn',
            ]
        );
        KhachHang::create(
            [
                'hoten'=>'Nguyễn Thành Phát',
                'gioitinh'=>'Nam',
                'sdt'=>'0165165485',
                'email'=>'abc@gmail.com',
            ]
        );
        KhachHang::factory(15)->create();
    }
}
