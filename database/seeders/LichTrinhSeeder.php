<?php

namespace Database\Seeders;

use App\Models\Tour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LichTrinhSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tour::where('id',1)->first()->lichtrinhs()->createMany([
            [
                'dia_diem_id'=>1,
                'ghichu'=>'ghi chú lịch trình 1',
                'trangthai'=>1,
            ],
            [
                'dia_diem_id'=>2,
                'ghichu'=>'ghi chú lịch trình 2',
                'trangthai'=>1,
            ]
        ]);
        Tour::where('id',2)->first()->lichtrinhs()->createMany([
            [
                'dia_diem_id'=>3,
                'ghichu'=>'ghi chú lịch trình 3',
                'trangthai'=>1,
            ],
            [
                'dia_diem_id'=>4,
                'ghichu'=>'ghi chú lịch trình 4',
                'trangthai'=>1,
            ]
        ]);
    }
}
