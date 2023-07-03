<?php

namespace Database\Seeders;

use App\Models\KhuyenMai;
use App\Models\DonHang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DonHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DonHang::create(
            [
                'ten'=>'Phạm Hữu Trung',
                'email'=>'0306201498@caothang.edu.vn',
                'sdt'=>'0345774006',
                'thoigiankhoihanh'=>'2023-05-08 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-05-04 20:00:00',
                'tongtien'=>2500000,
                'khuyen_mai_id'=>1,
                'tour_id'=>1,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>'Nguyễn Thành Phát',
                'email'=>'0306201474@caothang.edu.vn',
                'sdt'=>'0123456789',
                'thoigiankhoihanh'=>'2023-05-08 08:00:00',
                'sokhach'=>2,
                'ngaydat'=>'2023-05-04 20:00:00',
                'tongtien'=>4000000,
                'khuyen_mai_id'=>2,
                'tour_id'=>2,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>'Nguyễn Thành Phát',
                'email'=>'0306201474@caothang.edu.vn',
                'sdt'=>'0123456789',
                'thoigiankhoihanh'=>'2023-05-08 08:00:00',
                'sokhach'=>2,
                'ngaydat'=>'2023-05-04 20:00:00',
                'tongtien'=>4000000,
                'khuyen_mai_id'=>2,
                'tour_id'=>3,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>'Nguyễn Thành Phát',
                'email'=>'0306201474@caothang.edu.vn',
                'sdt'=>'0123456789',
                'thoigiankhoihanh'=>'2023-05-08 08:00:00',
                'sokhach'=>2,
                'ngaydat'=>'2023-05-04 20:00:00',
                'tongtien'=>4000000,
                'khuyen_mai_id'=>2,
                'tour_id'=>4,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>'Nguyễn Thành Phát',
                'email'=>'0306201474@caothang.edu.vn',
                'sdt'=>'0123456789',
                'thoigiankhoihanh'=>'2023-05-08 08:00:00',
                'sokhach'=>2,
                'ngaydat'=>'2023-05-04 20:00:00',
                'tongtien'=>4000000,
                'khuyen_mai_id'=>2,
                'tour_id'=>5,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>'Nguyễn Thành Phát',
                'email'=>'0306201474@caothang.edu.vn',
                'sdt'=>'0123456789',
                'thoigiankhoihanh'=>'2023-05-08 08:00:00',
                'sokhach'=>2,
                'ngaydat'=>'2023-05-04 20:00:00',
                'tongtien'=>4000000,
                'khuyen_mai_id'=>2,
                'tour_id'=>6,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>'Nguyễn Thành Phát',
                'email'=>'0306201474@caothang.edu.vn',
                'sdt'=>'0123456789',
                'thoigiankhoihanh'=>'2023-05-08 08:00:00',
                'sokhach'=>2,
                'ngaydat'=>'2023-05-04 20:00:00',
                'tongtien'=>4000000,
                'khuyen_mai_id'=>2,
                'tour_id'=>7,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
    }
}
