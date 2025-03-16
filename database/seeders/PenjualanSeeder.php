<?php

namespace Database\Seeders;

use App\Models\Penjualan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'aktifitas_id' => $faker->numberBetween(1, 400),
                'no_spk' => $faker->numberBetween(200, 1000),
                'pengajuan_id' => $faker->numberBetween(1, 100),
                'asuransi' => $faker->word,
                'jenis_asuransi' => $faker->word,
                'leasing' => $faker->word,
                'harga_mobil' => $faker->randomNumber(8),
                'jenis_pembelian' => $faker->randomElement(['Cash', 'Credit']),
                'tujuan_pembelian' => $faker->word,
                'tgl_jual' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Penjualan::insert($data);
    }
}
