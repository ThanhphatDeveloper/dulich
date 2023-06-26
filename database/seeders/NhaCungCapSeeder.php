<?php

namespace Database\Seeders;

use App\Models\NhaCungCap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NhaCungCapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NhaCungCap::create(['nhacungcap'=>'Thành phố Hồ Chí Minh']);
        NhaCungCap::create(['nhacungcap'=>'Hà Nội']);
        NhaCungCap::create(
            [
                'nhacungcap'=>'Đà Lạt',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'Vịnh Hạ Long',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'London',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'Lisbon',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'BALAN',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'SERBIA',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'LUXEMBOURG',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'ĐÀI LOAN',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'SAN DIEGO',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'DUBAI',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'CANADA',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'HOA KỲ',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'NHẬT BẢN',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'HÀN QUỐC',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'ÚC',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'Ý',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'SINGAPORE',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'BẮC NINH',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'VINH',
                
            ],
        );
        NhaCungCap::create(
            [
                'nhacungcap'=>'NGHỆ AN',
                
            ],
        );
        NhaCungCap::query()->update(['trangthai'=>1]);
    }
}
