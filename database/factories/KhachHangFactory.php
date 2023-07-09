<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KhachHang>
 */
class KhachHangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hoten'=>fake()->name(),
            'gioitinh'=>'Nam',
            'sdt'=>$this->randomphone(),
            'email'=>fake()->unique()->safeEmail(),
        ];
    }

    public function randomphone(): string{
        $phone = '0';

        for($i=1;$i<10;$i++){
            $phone=$phone.rand(0,9);
        }

        return $phone;
    }
}
