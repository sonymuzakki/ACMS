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
        MasterBank::create([
            'nama' => 'BRI',
            'nama_pemilik' => 'Zidan',
            'no_rekening' => '5424011563245',
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
        finance_penjualan_detail::create([
            'id' => 'PJD20250001',
            'penjualan_id' => 'PJ20250001',
            'produk_id' => 1,
            'qty' => 10,
            'harga_jual' => 10000,
            'total' => 100000,
            'created_by' => '1',
        ]);
        finance_penjualan::create([
            'id' => 'PJ20250001',
            'pelanggan_id' => 1,
            'jenis_transaksi_id' => 1,
            'pembayaran_id' => 1,
            'profit' => 20000,
            'tanggal' => '2025-05-19',
            'total' => 100000,
            'keterangan' => 'Pembayaran',
            'created_by' => '1',
        ]);
        MasterJenisTransaksi::create([
            'id' => 1,
            'kode' => "TARIK",
            'nama' => 'Tarik Tunai',
            'keterangan' => 'Pengambilan Uang tunai',
            'tipe' => 'Keluar',
            'created_by' => '1',
        ]);
    }
}
