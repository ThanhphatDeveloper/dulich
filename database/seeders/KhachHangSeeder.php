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
                'don_hang_id'=>1,
            ]
        );
        KhachHang::create(
            [
                'hoten'=>'Trần Văn C',
                'gioitinh'=>'Nam',
                'sdt'=>'0345774006',
                'email'=>'abc@gmail.com',
                'don_hang_id'=>2,
            ]
        );
        KhachHang::factory(15)->create();
    }
}
