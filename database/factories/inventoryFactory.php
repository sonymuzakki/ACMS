<?php

namespace Database\Factories;

use App\Models\inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\inventory>
 */
class inventoryFactory extends Factory
{
    protected $model = inventory::class;

    public function definition(): array
    {
        return [
            // 'id' => $this->faker->unique()->randomNumber(),
            'nopol' => $this->faker->word,
            'type' => $this->faker->word,
            'km' => $this->faker->numberBetween(1000, 100000),
            'merk_id' => 1,  // Set merk_id to 1
            'model' => $this->faker->word,
            'warna' => $this->faker->colorName,
            'tahun' => $this->faker->year,
            'transmisi' => $this->faker->randomElement(['Automatic', 'Manual']),
            'tgl_beli' => $this->faker->date(),
            'harga_beli' => $this->faker->numberBetween(10000000, 100000000),
            'harga_jual' => $this->faker->numberBetween(10000000, 100000000),
            'image' => $this->faker->imageUrl(),
            'status' => $this->faker->randomElement([0, 1, 2]),
        ];


    }
}
