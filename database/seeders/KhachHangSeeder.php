<?php

namespace Database\Seeders;

use App\Models\DonHang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DonHang::where('id',1)->first()->khach_hangs()->createMany([
            [
                'ho'=>'Phạm Hữu',
                'ten'=>'Trung',
                'gioitinh'=>'Nam',
                'sdt'=>'0345774006',
                'trangthai'=>1,
            ],
            [
                'ho'=>'Nguyễn Thị',
                'ten'=>'A',
                'gioitinh'=>'Nữ',
                'sdt'=>'0123456789',
                'trangthai'=>1,
            ]
        ]);
        DonHang::where('id',2)->first()->khach_hangs()->createMany([
            [
                'ho'=>'Trần Văn',
                'ten'=>'C',
                'gioitinh'=>'Nam',
                'sdt'=>'0345774006',
                'trangthai'=>1,
            ],
            [
                'ho'=>'Phan Thị',
                'ten'=>'D',
                'gioitinh'=>'Nữ',
                'sdt'=>'0123456789',
                'trangthai'=>1,
            ]
        ]);
    }
}
