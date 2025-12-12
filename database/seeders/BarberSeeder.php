<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Barber;

class BarberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $barbers = [
            ['name' => 'Arman', 'speciality' => 'Classic Cut'],
            ['name' => 'Budi', 'speciality' => 'Beard Trim'],
            ['name' => 'Citra', 'speciality' => 'Fade'],
        ];


        foreach ($barbers as $b) {
            Barber::create($b);
        }
    }
}
