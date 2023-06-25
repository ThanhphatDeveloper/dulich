<?php

namespace Database\Seeders;

use App\Models\LoaiTour;
use App\Models\Tour;
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
                'dia_diem_khoi_hanh_id'=>1,
                'dia_diem_ket_thuc_id'=>2,
                'phuongtien'=>'Xe khách',
                'trangthai'=>true,
                'thoi_gian_id'=>1,

                'nha_cung_cap_id'=>1,
            ],
            [
                'tentour'=>'Tour Hà Nội - Vịnh Hạ Long',
                'gia'=>3000000,
                'mota'=>'đoạn mô tả hn - vhl',
                'ngaykhoihanh'=>'2023-05-10 10:00:00',
                'dia_diem_khoi_hanh_id'=>3,
                'dia_diem_ket_thuc_id'=>4,
                'phuongtien'=>'Xe khách',
                'trangthai'=>true,
                'thoi_gian_id'=>2,
                'nha_cung_cap_id'=>2,
            ]
        ]);
    }
}
