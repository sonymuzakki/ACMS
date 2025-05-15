<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    // public function run()
    // {
    //     // Pastikan RoleSeeder sudah dijalankan agar role tersedia
    //     $adminRole = Role::where('name', 'admin')->first();
    //     $counterRole = Role::where('name', 'Counter')->first();
    //     $moderatorRole = Role::where('name', 'moderator')->first();

    //     // Pastikan semua permissions sudah ada di database
    //     $permissions = Permission::pluck('name')->toArray();

    //     $admin = User::firstOrCreate([
    //         'email' => 'admin@gmail.com'
    //     ], [
    //         'name' => 'Admin',
    //         'role_id' => 1,
    //         'password' => bcrypt('Intercomp4d4ng'),
    //     ]);

    //     if ($adminRole) {
    //         $admin->assignRole($adminRole);
    //         $admin->syncPermissions($permissions);
    //     }

    //     $api = User::firstOrCreate([
    //         'email' => 'api@gmail.com'
    //     ], [
    //         'name' => 'apiapps',
    //         'role_id' => 3,
    //         'password' => bcrypt('12345678'),
    //     ]);

    //     if ($adminRole) {
    //         $api->assignRole($adminRole);
    //         $api->syncPermissions($permissions);
    //     }

    //     $user = User::firstOrCreate([
    //         'email' => 'user@gmail.com'
    //     ], [
    //         'name' => 'User',
    //         'role_id' => 3,
    //         'password' => bcrypt('12345678'),
    //     ]);

    //     if ($counterRole) {
    //         $user->assignRole($counterRole);
    //         $user->syncPermissions($permissions);
    //     }

    //     $moderator = User::firstOrCreate([
    //         'email' => 'moderator@gmail.com'
    //     ], [
    //         'name' => 'Moderator',
    //         'role_id' => 3,
    //         'password' => bcrypt('12345678'),
    //     ]);

    //     if ($moderatorRole) {
    //         $moderator->assignRole($moderatorRole);
    //         $moderator->syncPermissions($permissions);
    //     }
    // }
    public function run()
{
    $adminRole = Role::where('name', 'admin')->first();
    $counterRole = Role::where('name', 'Counter')->first();
    $moderatorRole = Role::where('name', 'moderator')->first();

    $permissions = Permission::pluck('name')->toArray();

    // Berikan permission ke role admin saja (satu kali)
    if ($adminRole) {
        $adminRole->syncPermissions($permissions);
    }

    $admin = User::firstOrCreate(
        ['email' => 'admin@gmail.com'],
        [
            'name' => 'Admin',
            'role_id' => 1,
            'password' => bcrypt('Intercomp4d4ng'),
        ]
    );

    if ($adminRole) {
        $admin->assignRole($adminRole);
    }

    $api = User::firstOrCreate(
        ['email' => 'api@gmail.com'],
        [
            'name' => 'apiapps',
            'role_id' => 3,
            'password' => bcrypt('12345678'),
        ]
    );

    if ($adminRole) {
        $api->assignRole($adminRole);
    }

    $user = User::firstOrCreate(
        ['email' => 'user@gmail.com'],
        [
            'name' => 'User',
            'role_id' => 3,
            'password' => bcrypt('12345678'),
        ]
    );

    if ($counterRole) {
        // Contoh kamu bisa beri permission khusus ke role counter
        // misal: $counterRole->syncPermissions(['stock.add', 'stock.edit']);
        $user->assignRole($counterRole);
    }

    $moderator = User::firstOrCreate(
        ['email' => 'moderator@gmail.com'],
        [
            'name' => 'Moderator',
            'role_id' => 3,
            'password' => bcrypt('12345678'),
        ]
    );

    if ($moderatorRole) {
        $moderator->assignRole($moderatorRole);
    }
}

}
