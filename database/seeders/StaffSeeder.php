<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Staff;
use App\Models\User;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Staff::create([
            'name' => 'Staff',
            'email' => 'staff@gmail.com',
            'MEMBER_ID' => 'GO-0000001',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'MEMBER_ID' => 'GM-0000001',
            'password' => Hash::make('password'),
        ]);
    }
}
