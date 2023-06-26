<?php

namespace Database\Seeders;

use App\Models\DiaDiem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiaDiemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DiaDiem::create(
            [
                'diadiem'=>'Thành phố Hồ Chí Minh',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'Đà Lạt',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'Hà Nội',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'Vịnh Hạ Long',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'London',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'Lisbon',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'BALAN',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'SERBIA',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'LUXEMBOURG',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'ĐÀI LOAN',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'SAN DIEGO',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'DUBAI',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'CANADA',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'HOA KỲ',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'NHẬT BẢN',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'HÀN QUỐC',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'ÚC',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'Ý',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'SINGAPORE',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'BẮC NINH',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'VINH',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'NGHỆ AN',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'TÂY BAN NHA',
                'trangthai'=>1,
            ],
        );

    }
}
