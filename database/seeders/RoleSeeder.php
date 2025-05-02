<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Buat Role Jika Belum Ada
        $roles = ['admin', 'Admin Unit', 'PIC', 'Counter'];
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
        }

        // Data permissions dengan group_name
        $permissions = [
            ['name' => 'dashboard.menu', 'group_name' => 'Dashboard'],
            ['name' => 'stock.menu', 'group_name' => 'Stock'],
            ['name' => 'stock.add', 'group_name' => 'Stock'],
            ['name' => 'stock.edit', 'group_name' => 'Stock'],
            ['name' => 'stock.delete', 'group_name' => 'Stock'],
            ['name' => 'prospecting.beli.menu', 'group_name' => 'Prospecting Beli'],
            ['name' => 'prospecting.beli.add', 'group_name' => 'Prospecting Beli'],
            ['name' => 'prospecting.beli.edit', 'group_name' => 'Prospecting Beli'],
            ['name' => 'prospecting.beli.delete', 'group_name' => 'Prospecting Beli'],
            ['name' => 'prospecting.jual.menu', 'group_name' => 'Prospecting Jual'],
            ['name' => 'prospecting.jual.add', 'group_name' => 'Prospecting Jual'],
            ['name' => 'prospecting.jual.edit', 'group_name' => 'Prospecting Jual'],
            ['name' => 'prospecting.jual.delete', 'group_name' => 'Prospecting Jual'],
            ['name' => 'pengajuan.credit.menu', 'group_name' => 'Pengajuan'],
            ['name' => 'pengajuan.credit.add', 'group_name' => 'Pengajuan'],
            ['name' => 'pengajuan.credit.edit', 'group_name' => 'Pengajuan'],
            ['name' => 'pengajuan.credit.delete', 'group_name' => 'Pengajuan'],
            ['name' => 'penjualan.menu', 'group_name' => 'Penjualan'],
            ['name' => 'penjualan.add', 'group_name' => 'Penjualan'],
            ['name' => 'user.menu', 'group_name' => 'User'],
            ['name' => 'user.add', 'group_name' => 'User'],
            ['name' => 'user.edit', 'group_name' => 'User'],
            ['name' => 'role.permission', 'group_name' => 'Administrasi'],
            ['name' => 'report', 'group_name' => 'Report'],
        ];

        // Insert data permissions
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(
                ['name' => $perm['name']],
                ['guard_name' => 'web', 'group_name' => $perm['group_name']]
            );
        }
    }
}
