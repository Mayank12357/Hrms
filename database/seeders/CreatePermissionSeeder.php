<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreatePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'role.create']);
        Permission::create(['name' => 'role.update']);
        Permission::create(['name' => 'role.delete']);
        Permission::create(['name' => 'role.read']);
        Permission::create(['name' => 'role.edit']);

        Permission::create(['name' => 'permission.create']);
        Permission::create(['name' => 'permission.update']);
        Permission::create(['name' => 'permission.delete']);
        Permission::create(['name' => 'permission.read']);
        Permission::create(['name' => 'permission.edit']);

        // Creating a Super Admin User
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => '12345678'
        ]);

        // Creating a Role
        $role = Role::create(['name' => 'admin']);

        // Getting all the Permission by name
        $permissions = Permission::all()->pluck('name');

        // Giving permission to role
        $role->givePermissionTo($permissions);

        //assigning role to a user
        $user->assignRole([$role->id]);
    }
}
