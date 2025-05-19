<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Aktifitas;
use App\Models\Barang;
use App\Models\inventory;
use App\Models\Kategori;
use App\Models\User;
use App\Models\lokasi;
use App\Models\MasterBank;
use App\Models\MasterKategori;
use App\Models\MasterPelanggan;
use App\Models\MasterProduk;
use App\Models\MasterSatuan;
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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        inventory::factory(1000)->create();

        Merk::create([
            'nama' => 'Toyota'
        ]);
        MasterBank::create([
            'nama' => 'BRI',
            'nama_pemilik' => 'Zidan',
            'created_by' => '1',
        ]);

        MasterKategori::create([
            'id' => 1,
            'nama' => 'Pulsa',
            'created_by' => '1',
        ]);

        MasterSupplier::create([
            'id' => 1,
            'nama' => 'sonny',
            'no_hp' => 123456789,
            'vendor' => 'telkomsel',
            'created_by' => '1',
        ]);

        MasterPelanggan::create([
            'id' => 1,
            'nama' => 'sonny',
            'no_hp' => 123456789,
            'alamat' => 'jati',
            'created_by' => '1',
        ]);

        MasterProduk::create([
            'id' => 1,
            'kategori_id' => 1,
            'nama' => 'pulsa',
            'qty' => 100,
            'harga_jual' => 10000,
            'harga_beli_terakhir' => 9000,
            'satuan_id' => 1,
            'created_by' => '1',
        ]);

        MasterSatuan::create([
            'id' => 1,
            'nama' => 'Pcs',
            'created_by' => '1',
        ]);



    }
}
