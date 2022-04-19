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
            'GYM_ID' => 'GYM-000001',
            'GYM_NAME' => 'Gym Name',
            'GYM_OWNER' => 'GO-0000001',
            'GYM_LOCATION' => 'Gym Location',
            'GYM_IMAGE' => 'Gym Image',
            'GYM_DETAILS' => 'Gym Details',
        ]);
    }
}
