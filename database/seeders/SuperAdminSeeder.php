<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::updateOrCreate(
            ['email' => 'yshailendra216@gmail.com'],
            [
                'name' => 'Shailendra Kr Yadav',
                'password' => Hash::make('pass12345'),
            ]
        );
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::updateOrCreate(
            ['email' => 'ysly305@gmail.com'],
            [
                'name' => 'Shailen Kr Yadav',
                'password' => Hash::make('pass1234'),
            ]
        );
        $admin->assignRole('Admin');

        // Creating School Manager User
        $principal = User::updateOrCreate(
            ['email' => 'shailen216@gmail.com'],
            [
                'name' => 'Jitu Yadav',
                'password' => Hash::make('pass123'),
            ]
        );
        $principal->assignRole('Principal');
    }
}
