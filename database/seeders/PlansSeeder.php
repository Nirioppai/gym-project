<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plans;

class PlansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plans::create([
            'PLAN_ID' => 'PLAN-00001',
            'PLAN_NAME' => 'Starter Plan',
            'PLAN_DESCRIPTION' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'PLAN_VALIDITY' => '10',
            'PLAN_AMOUNT' => '40',
            'PLAN_STATUS' => 'Active',
            'GYM_ID' => 'GYM-000001',
        ]);

        Plans::create([
            'PLAN_ID' => 'PLAN-00002',
            'PLAN_NAME' => 'Basic Plan',
            'PLAN_DESCRIPTION' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'PLAN_VALIDITY' => '20',
            'PLAN_AMOUNT' => '80',
            'PLAN_STATUS' => 'Active',
            'GYM_ID' => 'GYM-000001',
        ]);

        Plans::create([
            'PLAN_ID' => 'PLAN-00003',
            'PLAN_NAME' => 'Pro Plan',
            'PLAN_DESCRIPTION' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'PLAN_VALIDITY' => '30',
            'PLAN_AMOUNT' => '120',
            'PLAN_STATUS' => 'Active',
            'GYM_ID' => 'GYM-000001',
        ]);
    }
}
