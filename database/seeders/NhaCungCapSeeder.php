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
        NhaCungCap::query()->update(['trangthai'=>1]);
    }
}
