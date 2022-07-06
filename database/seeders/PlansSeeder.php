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
            'plan_id' => 'PLAN-00001',
            'plan_name' => 'Starter Plan',
            'plan_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'plan_validity' => '10',
            'plan_amount' => '40',
            'plan_status' => 'Active',
            'gym_id' => 'GYM-000001',
        ]);

        Plans::create([
            'plan_id' => 'PLAN-00002',
            'plan_name' => 'Basic Plan',
            'plan_description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
            'plan_validity' => '20',
            'plan_amount' => '80',
            'plan_status' => 'Active',
            'gym_id' => 'GYM-000001',
        ]);

        Plans::create([
            'plan_id' => 'PLAN-00003',
            'plan_name' => 'Pro Plan',
            'plan_description' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.',
            'plan_validity' => '30',
            'plan_amount' => '120',
            'plan_status' => 'Active',
            'gym_id' => 'GYM-000001',
        ]);
    }
}
