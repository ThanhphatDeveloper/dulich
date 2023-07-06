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
                'thoigiankhoihanh'=>'2023-06-30 08:00:00',
                'sokhach'=>5,
                'ngaydat'=>'2023-06-29 20:00:00',
                'tongtien'=>2500000,
                'khuyen_mai_id'=>1,
                'tour_id'=>1,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-22 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-29 20:00:00',
                'tongtien'=>85100000,
                'khuyen_mai_id'=>2,
                'tour_id'=>9,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-22 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-29 20:00:00',
                'tongtien'=>85100000,
                'khuyen_mai_id'=>2,
                'tour_id'=>9,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>'Nguyễn Thành Phát',
                'email'=>'0306201474@caothang.edu.vn',
                'sdt'=>'0123456789',
                'thoigiankhoihanh'=>'2023-06-29 08:00:00',
                'sokhach'=>6,
                'ngaydat'=>'2023-06-28 20:00:00',
                'tongtien'=>4000000,
                'khuyen_mai_id'=>2,
                'tour_id'=>2,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>'Nguyễn Thành Phát',
                'email'=>'0306201474@caothang.edu.vn',
                'sdt'=>'0123456789',
                'thoigiankhoihanh'=>'2023-06-29 08:00:00',
                'sokhach'=>6,
                'ngaydat'=>'2023-06-28 20:00:00',
                'tongtien'=>4000000,
                'khuyen_mai_id'=>2,
                'tour_id'=>2,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>'Trần Văn A',
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-28 08:00:00',
                'sokhach'=>2,
                'ngaydat'=>'2023-06-27 20:00:00',
                'tongtien'=>88990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>3,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>'Trần Văn A',
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-28 08:00:00',
                'sokhach'=>2,
                'ngaydat'=>'2023-06-27 20:00:00',
                'tongtien'=>88990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>3,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>'Trần Văn A',
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-28 08:00:00',
                'sokhach'=>2,
                'ngaydat'=>'2023-06-27 20:00:00',
                'tongtien'=>88990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>3,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>'Trần Văn A',
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-28 08:00:00',
                'sokhach'=>2,
                'ngaydat'=>'2023-06-27 20:00:00',
                'tongtien'=>88990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>3,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>'Trần Văn A',
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-28 08:00:00',
                'sokhach'=>2,
                'ngaydat'=>'2023-06-27 20:00:00',
                'tongtien'=>88990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>3,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>'Phạm Hữu Trung',
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=> fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-27 08:00:00',
                'sokhach'=>2,
                'ngaydat'=>'2023-06-26 20:00:00',
                'tongtien'=>71990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>4,
                'tenphuongthuctt'=>'cod',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=> fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-27 08:00:00',
                'sokhach'=>2,
                'ngaydat'=>'2023-06-26 20:00:00',
                'tongtien'=>71990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>4,
                'tenphuongthuctt'=>'cod',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-26 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-25 20:00:00',
                'tongtien'=>86990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>5,
                'tenphuongthuctt'=>'vnpay',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-26 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-25 20:00:00',
                'tongtien'=>86990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>5,
                'tenphuongthuctt'=>'vnpay',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-26 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-25 20:00:00',
                'tongtien'=>86990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>5,
                'tenphuongthuctt'=>'vnpay',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-26 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-25 20:00:00',
                'tongtien'=>86990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>5,
                'tenphuongthuctt'=>'vnpay',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-26 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-25 20:00:00',
                'tongtien'=>86990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>5,
                'tenphuongthuctt'=>'vnpay',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-26 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-25 20:00:00',
                'tongtien'=>86990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>5,
                'tenphuongthuctt'=>'vnpay',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-25 08:00:00',
                'sokhach'=>2,
                'ngaydat'=>'2023-06-24 20:00:00',
                'tongtien'=>61990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>6,
                'tenphuongthuctt'=>'vnpay',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-24 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-23 20:00:00',
                'tongtien'=>54900000,
                'khuyen_mai_id'=>2,
                'tour_id'=>7,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-24 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-23 20:00:00',
                'tongtien'=>54900000,
                'khuyen_mai_id'=>2,
                'tour_id'=>7,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-24 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-23 20:00:00',
                'tongtien'=>54900000,
                'khuyen_mai_id'=>2,
                'tour_id'=>7,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-23 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-22 20:00:00',
                'tongtien'=>94600000,
                'khuyen_mai_id'=>2,
                'tour_id'=>8,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-22 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-21 20:00:00',
                'tongtien'=>85100000,
                'khuyen_mai_id'=>2,
                'tour_id'=>9,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-22 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-21 20:00:00',
                'tongtien'=>85100000,
                'khuyen_mai_id'=>2,
                'tour_id'=>9,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-22 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-21 20:00:00',
                'tongtien'=>85100000,
                'khuyen_mai_id'=>2,
                'tour_id'=>9,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-22 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-21 20:00:00',
                'tongtien'=>85100000,
                'khuyen_mai_id'=>2,
                'tour_id'=>9,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-21 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-20 20:00:00',
                'tongtien'=>15990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>10,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>10,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>1,
            ]
        );

        // Chưa duyệt
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>1,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>2,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>3,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>4,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>5,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>6,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>7,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>8,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>9,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>10,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>10,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
            ]
        );

        // Không duyệt
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>1,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
                'thoigianxoa'=>'2023-06-19 20:00:00',
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>2,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
                'thoigianxoa'=>'2023-06-19 20:00:00',
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>3,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
                'thoigianxoa'=>'2023-06-19 20:00:00',
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>4,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
                'thoigianxoa'=>'2023-06-19 20:00:00',
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>5,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
                'thoigianxoa'=>'2023-06-19 20:00:00',
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>6,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
                'thoigianxoa'=>'2023-06-19 20:00:00',
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>7,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
                'thoigianxoa'=>'2023-06-19 20:00:00',
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>8,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
                'thoigianxoa'=>'2023-06-19 20:00:00',
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>9,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
                'thoigianxoa'=>'2023-06-19 20:00:00',
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>10,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
                'thoigianxoa'=>'2023-06-19 20:00:00',
            ]
        );
        DonHang::create(
            [
                'ten'=>fake()->name(),
                'email'=>fake()->unique()->safeEmail(),
                'sdt'=>$this->randomphone(),
                'thoigiankhoihanh'=>'2023-06-20 08:00:00',
                'sokhach'=>3,
                'ngaydat'=>'2023-06-19 20:00:00',
                'tongtien'=>12990000,
                'khuyen_mai_id'=>2,
                'tour_id'=>10,
                'tenphuongthuctt'=>'momo',
                'tienthanhtoan'=>1200000,
                'mathanhtoan'=>Str::random(20),
                'tenthanhtoan'=>fake()->name(),
                'thoigianthanhtoan'=>'2023-05-08 08:00:00',
                'trangthai'=>0,
                'thoigianxoa'=>'2023-06-19 20:00:00',
            ]
        );
    }

    public function randomphone(): string{
        $phone = '0';

        for($i=1;$i<10;$i++){
            $phone=$phone.rand(0,9);
        }

        return $phone;
    }
}
