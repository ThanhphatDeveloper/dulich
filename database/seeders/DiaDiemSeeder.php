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
    }
}
