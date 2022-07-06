<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GymList;

class GymListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GymList::create([
            'gym_id' => 'GYM-000001',
            'gym_name' => 'Gym Name',
            'gym_owner' => 'GO-0000001',
            'gym_location' => 'Gym Location',
            'gym_image' => 'Gym Image',
            'gym_details' => 'Gym Details',
        ]);
    }
}
