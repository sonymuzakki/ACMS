<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Merk;
use App\Models\User;
use App\Models\Barang;
use App\Models\lokasi;
use App\Models\Kategori;
use App\Models\Aktifitas;
use App\Models\inventory;
use App\Models\MasterBank;
use App\Models\Pembayaran;
use App\Models\MasterProduk;
use App\Models\MasterSatuan;
use App\Models\MasterKategori;
use App\Models\MasterSupplier;
use App\Models\MasterPelanggan;
use Illuminate\Database\Seeder;
use App\Models\finance_penjualan;
use App\Models\MasterJenisTransaksi;
use App\Models\finance_penjualan_detail;

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

        MasterBank::insert([
            [
                'nama' => 'BRI',
                'nama_pemilik' => 'Zidan',
                'no_rekening' => '5424011563245',
                'created_by' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'BCA',
                'nama_pemilik' => 'Rina',
                'no_rekening' => '1234567890',
                'created_by' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Mandiri',
                'nama_pemilik' => 'Dewi',
                'no_rekening' => '9876543210',
                'created_by' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'BNI',
                'nama_pemilik' => 'Aldi',
                'no_rekening' => '1122334455',
                'created_by' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        MasterKategori::insert([
            [
                'id' => 1,
                'nama' => 'Tarik Tunai',
                'created_by' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nama' => 'Beras',
                'created_by' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nama' => 'Kabel Charger C',
                'created_by' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'nama' => 'Kabel Charger Micro',
                'created_by' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'nama' => 'Top Up',
                'created_by' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'nama' => 'Accesoris',
                'created_by' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

        MasterSupplier::insert([
            [
                'id' => 1,
                'nama' => 'sonny',
                'no_hp' => 123456789,
                'vendor' => 'telkomsel',
                'created_by' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nama' => 'budi',
                'no_hp' => 987654321,
                'vendor' => 'beras',
                'created_by' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nama' => 'andi',
                'no_hp' => 123456789,
                'vendor' => 'indosat',
                'created_by' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        MasterPelanggan::create([
            'id' => 1,
            'nama' => 'toni',
            'no_hp' => 123456789,
            'alamat' => 'jati',
            'created_by' => '1',

        ]);

        MasterProduk::insert([
            [
                'id' => 1,
                'kategori_id' => 1,
                'nama' => 'Kabel Charger C',
                'qty' => 100,
                'harga_beli' => 5000,
                'harga_jual' => 10000,
                'harga_beli_terakhir' => 8000,
                'satuan_id' => 2,
                'created_by' => '1',
            ],
            [
                'id' => 4,
                'kategori_id' => 2,
                'nama' => 'Beras',
                'qty' => 20,
                'harga_beli' => 5000,
                'harga_jual' => 50000,
                'harga_beli_terakhir' => 40000,
                'satuan_id' => 1,
                'created_by' => '1',
            ],
            [
                'id' => 2,
                'kategori_id' => 3,
                'nama' => 'Kabel Charger Micro',
                'qty' => 50,
                'harga_beli' => 5000,
                'harga_jual' => 12000,
                'harga_beli_terakhir' => 9000,
                'satuan_id' => 2,
                'created_by' => '1',
            ],
            [
                'id' => 3,
                'kategori_id' => 5,
                'nama' => 'Top Up Pulsa',
                'qty' => 200,
                'harga_beli' => 5000,
                'harga_jual' => 50000,
                'harga_beli_terakhir' => 45000,
                'satuan_id' => 2,
                'created_by' => '1',
            ]

        ]);

        MasterSatuan::insert([
            [
                'id' => 1,
                'nama' => 'Karung',
                'created_by' => '1',
            ],
            [
                'id' => 2,
                'nama' => 'Pcs',
                'created_by' => '1',
            ],
            [
                'id' => 3,
                'nama' => 'Liter',
                'created_by' => '1',
            ]
        ]);

        finance_penjualan::create([
            'id' => 'PJ20250001',
            'pelanggan_id' => 1,
            'jenis_transaksi_id' => 1,
            'pembayaran_id' => 1,
            'tanggal' => '2025-05-19',
            'subtotal' => 100000,
            'keterangan' => 'Pembayaran',
            'created_by' => '1',
        ]);

        finance_penjualan_detail::create([
            'id' => 'PJD20250001',
            'penjualan_id' => 'PJ20250001',
            'produk_id' => 1,
            'nominal' => 10000,
            'profit' => 2000,
            'qty' => 10,
            'keterangan' => 'Pembelian Kabel Charger C',
            'harga_beli' => 8000,
            'harga_jual' => 10000,
            'total' => 100000,
            'created_by' => '1',
        ]);


        MasterJenisTransaksi::insert([
            [
                'id' => 1,
                'kategori_id' => 1,
                'nama' => 'Tarik Tunai',
                'keterangan' => 'Pengambilan Uang tunai',
                'tipe' => 'Keluar',
                'created_by' => '1',
            ],
            [
                'id' => 2,
                'kategori_id' => 2,
                'nama' => 'Beras',
                'keterangan' => 'Beras Karung',
                'tipe' => 'Keluar',
                'created_by' => '1',
            ],

        ]);
    }
}
