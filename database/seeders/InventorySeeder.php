<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Inventory;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();
        $inventoryData = [];

        for ($i = 0; $i < 100; $i++) {
            $inventoryData[] = [
                'type' => $faker->randomElement(['SUV', 'Sedan', 'Hatchback']),
                'nopol' => $faker->regexify('[A-Z]{1,2}[0-9]{4}[A-Z]{2,3}'),
                'km' => $faker->numberBetween(1000, 100000),
                'no_rangka' => $faker->regexify('[A-Z0-9]{17}'),
                'merk_id' => $faker->numberBetween(1, 10), // Asumsikan Anda memiliki 10 merk
                'model' => $faker->word,
                'warna' => $faker->safeColorName,
                'tahun' => $faker->year,
                'transmisi' => $faker->randomElement(['Automatic', 'Manual']),
                'tgl_beli' => $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'), // Random tanggal beli dalam setahun terakhir
                'penjual' => $faker->name,
                'harga_beli' => $faker->numberBetween(100000000, 500000000),
                'harga_jual' => $faker->numberBetween(150000000, 550000000),
                'status' => $faker->randomElement([0, 1, 2]),
                'sales' => $faker->name,
                'spv' => $faker->name,
                'jenis_pembelian' => $faker->randomElement(['Cash', 'Credit', 'Trade In']),
                'nama_customer' => $faker->name,
                'komisi' => $faker->numberBetween(1000000, 5000000),
                'keterangan' => $faker->randomElement(['Titipan Direksi', 'Direct', 'Trade In']),
                'grade' => $faker->randomElement(['A', 'B', 'C']),
                'image' => $faker->imageUrl(640, 480, 'cars'),
                'simulasi' => 'Simulasi ' . $i,
                'leasing' => $faker->company,
                'dp_setor' => $faker->numberBetween(10000000, 50000000),
                'angsuran' => $faker->numberBetween(1000000, 10000000),
                'tenor' => $faker->numberBetween(12, 48),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Inventory::insert($inventoryData);
    }
}
