<?php

namespace Database\Seeders;

use App\Models\Pengajuan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PengajuanSeeder extends Seeder
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
                'aktifitas_id' => $faker->numberBetween(1,400),
                'harga_mobil' => $faker->numberBetween(100000000, 500000000),
                'leasing' => $faker->randomElement(['MTF','TAF','ACC']),
                'dp' => $faker->numberBetween(100000, 1000000000),// 'no_rangka' => $faker->regexify('[A-Z0-9]{17}'),
                'angsuran' => $faker->numberBetween(100000, 10000000), // Asumsikan Anda memiliki 10 merk
                'tenor' => $faker->numberBetween(1,72),
                'status' => $faker->numberBetween(1,0,2),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Pengajuan::insert($data);
    }
}
