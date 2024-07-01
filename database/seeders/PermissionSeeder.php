<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void
    {
        $permissions = [
            'create-role',
            'edit-role',
            'delete-role',

            'create-user',
            'edit-user',
            'delete-user',

            'create-student',
            'edit-student',
            'delete-student',

            'create-teacher',
            'edit-teacher',
            'delete-teacher',

            'create-course',
            'edit-course',
            'delete-course',

            'create-batch',
            'edit-batch',
            'delete-batch',

            'create-enrollment',
            'edit-enrollment',
            'delete-enrollment',

            'create-payment',
            'edit-payment',
            'delete-payment',
         ];

          // Looping and Inserting Array's Permissions into Permission Table
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
          }
    }
}
