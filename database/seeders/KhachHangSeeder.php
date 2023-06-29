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
                'ho'=>'Phạm Hữu',
                'ten'=>'Trung',
                'gioitinh'=>'Nam',
                'sdt'=>'0345774006',
                'don_hang_id'=>1,
                'trangthai'=>1,
            ]
        );
        KhachHang::create(
            [
                'ho'=>'Trần Văn',
                'ten'=>'C',
                'gioitinh'=>'Nam',
                'sdt'=>'0345774006',
                'don_hang_id'=>2,
                'trangthai'=>1,
            ]
        );
    }
}
