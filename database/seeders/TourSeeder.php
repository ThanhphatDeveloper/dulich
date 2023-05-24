<?php

namespace Database\Seeders;

use App\Models\LoaiTour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoaiTour::where('loaitour','Trong nước')->first()->tours()->createMany([
            [
                'tentour'=>'Tour Thành phố Hồ Chí Minh - Đà Lạt',
                'gia'=>1200000,
                'mota'=>'đoạn mô tả hcm - dl',
                'ngaykhoihanh'=>'2023-05-08 08:00:00',
                'diemkhoihanh'=>'Thành phố Hồ Chí Minh',
                'diemketthuc'=>'Đà Lạt',
                'thoigian'=>'5N4D',
                'phuongtien'=>'Xe khách',
                'trangthai'=>true,
                'nha_cung_cap_id'=>1,
                'khuyen_mai_id'=>null,
            ],
            [
                'tentour'=>'Tour Hà Nội - Vịnh Hạ Long',
                'gia'=>3000000,
                'mota'=>'đoạn mô tả hn - vhl',
                'ngaykhoihanh'=>'2023-05-10 10:00:00',
                'diemkhoihanh'=>'Hà Nội',
                'diemketthuc'=>'Vịnh Hạ Long',
                'thoigian'=>'7N6D',
                'phuongtien'=>'Xe khách',
                'trangthai'=>true,
                'nha_cung_cap_id'=>2,
                'khuyen_mai_id'=>2,
            ]
        ]);
    }
}
