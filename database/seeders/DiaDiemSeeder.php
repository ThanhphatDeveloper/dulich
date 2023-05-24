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
                'diadiem'=>'dia diem 1',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'dia diem 2',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'dia diem 3',
                'trangthai'=>1,
            ],
        );
        DiaDiem::create(
            [
                'diadiem'=>'dia diem 4',
                'trangthai'=>1,
            ],
        );
    }
}
