<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Aktifitas;
use App\Models\Barang;
use App\Models\inventory;
use App\Models\User;
use App\Models\lokasi;
use App\Models\MasterSupplier;
use App\Models\Merk;
use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);

        // \App\Models\inventory::factory(1000)->create();

        \App\Models\Inventory::factory(1000)->create();

        Merk::create([
            'nama' => 'Toyota'
        ]);

        Barang::create([
            'id' => 1,
            'nama' => 'Dana',
            'created_by' => '1',
        ]);

        MasterSupplier::create([
            'id' => 1,
            'nama' => 'sonny',
            'no_hp' => 123456789,
            'vendor' => 'telkomsel',
            'created_by' => '1',
        ]);
        Pembayaran::create([
            'id' => 1,
            'nama' => 'Dana',
            'created_by' => '1',
        ]);


    }
}
