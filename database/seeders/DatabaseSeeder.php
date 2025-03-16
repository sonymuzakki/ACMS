<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Aktifitas;
use App\Models\inventory;
use App\Models\User;
use App\Models\lokasi;
use App\Models\Merk;
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

        Aktifitas::create([
            'inventory_id' => 1,
            'nama_customer' => 'randi',
            'sumber_prospek' => 'Walk In',
            'category' => '1',
        ]);

        inventory::create([
            'id' => 1,
            'type' => 'innova',
            'nopol' => 'ba 4559 bm',
            'km' => '10000',
            'merk_id' => '1',
            'model' => 'suv',
            'warna' => 'hitam',
            'tahun' => '2022',
            'transmisi' => 'Manual',
            'tgl_beli' => '2022-04-04',
            'penjual' => 'sony',
            'harga_beli' => '',
            'status' => '0',
        ]);

    }
}
