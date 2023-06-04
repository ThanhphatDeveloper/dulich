<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(15)->create();

        User::find(1)->update(
            [
                'ho'=>'Phạm Hữu',
                'ten'=>'Trung',
                'email'=>'admin@gmail.com',
                'sdt'=>'0345774006',
                'image'=>'testimage',
                'password'=>Hash::make('0128'),
                'admin'=>1,
                'trangthai'=>1
            ]
        );
    }
}
