<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->createRoleIfNotExists('Super Admin');
        // $this->createRoleIfNotExists('Admin');
        // $this->createRoleIfNotExists('Principal');
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $principal = Role::create(['name' => 'Principal']);


        // $admin = Role::where('name', 'Admin')->first();
        // $principal = Role::where('name', 'Principal')->first();

        // if ($admin) {
            $admin->givePermissionTo([
                'create-user',
                'edit-user',
                'delete-user',

                'create-student',
                'edit-student',
                'delete-student',

                'create-teacher',
                'edit-teacher',
                'delete-teacher',
            ]);

        // if ($principal) {
            $principal->givePermissionTo([
                'create-student',
                'edit-student',
                'delete-student',

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
                'delete-payment'
            ]);
        }
    }

    /**
     * Create a role if it doesn't already exist.
     *





     */
//     private function createRoleIfNotExists(string $roleName): void
//     {
//         $guardName = 'web'; // Set your guard name here

//         // Check if the role already exists
//         $existingRole = Role::where('name', $roleName)->where('guard_name', $guardName)->first();

//         // Create the role only if it doesn't already exist
//         if (!$existingRole) {
//             Role::create(['name' => $roleName, 'guard_name' => $guardName]);
//         }
//     }
// }
