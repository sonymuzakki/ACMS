<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role_id' => 1,
            'password' => bcrypt('1'),
        ]);

        $admin->assignRole('admin');

        $api = User::create([
            'name' => 'apiapps',
            'email' => 'api@gmail.com',
            'role_id' => '3',
            'password' => bcrypt('12345678'),
        ]);

        $api->assignRole('admin');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'role_id' => 3,
            'password' => bcrypt('12345678'),
        ]);

        $user->assignRole('user');

        $moderator = User::create([
            'name' => 'Moderator',
            'email' => 'moderator@gmail.com',
            'role_id' => 3,
            'password' => bcrypt('12345678'),
        ]);

        $moderator->assignRole('moderator');

        $permission = Permission::create(['name' => 'read role']);
        $permission = Permission::create(['name' => 'create role']);
        $permission = Permission::create(['name' => 'update role']);
        $permission = Permission::create(['name' => 'delete role']);
        Permission::create(['name' => 'read moderator']);

        $admin->givePermissionTo(['read role','create role','update role','delete role','read moderator',]);
        $api->givePermissionTo(['read role','create role','update role','delete role','read moderator',]);
        $user->givePermissionTo(['read role','create role','update role','delete role','read moderator']);

    }
}
