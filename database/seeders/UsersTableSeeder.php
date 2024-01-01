<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        User::create([
            'name' => 'Customer4',
            'email' => 'customer4@example.com',
            'password' => Hash::make('123'),
            'user_type' => 'customer',
            'approved' => 0,
            'phone' => '0987654321', // replace with a valid phone number
        ]);
    }
}
