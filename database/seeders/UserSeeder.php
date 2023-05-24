<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(50)->create();

        User::find(1)->update(
            [
                'ho'=>'Phạm Hữu',
                'ten'=>'Trung',
                'email'=>'admin@gmail.com',
                'sdt'=>'0345774006',
                'image'=>'testimage',
                'admin'=>1,
                'trangthai'=>1
            ]
        );
    }
}
