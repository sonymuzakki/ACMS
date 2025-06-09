<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesController;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Pos\SalesController;
use App\Http\Controllers\Pos\UsersController;
use App\Http\Controllers\Pos\MasterController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Pos\AktifitasController;
use App\Http\Controllers\Pos\PengajuanController;
use App\Http\Controllers\Pos\PenjualanController;
use App\Http\Controllers\Pos\PermissionController;
use App\Http\Controllers\Pos\AktifitasBeliController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Pages\RoleController as PagesRoleController;
use App\Http\Controllers\Pages\UsersNewController;
use App\Http\Controllers\Pos\FinanceController;
use App\Http\Controllers\User\UsersController as UserUsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/tes', function () {
    return view('backend1.master.role.index');
});
Route::get('/testing', function () {
    return view('master1.testing');
});


Route::middleware(['auth'])->group(function () {

    Route::controller(MasterController::class)->group(function () {

        // Routes untuk Barang
        Route::get('/kategori', 'index_kategori')->name('index.kategori');
        Route::post('/kategori/store', 'store_kategori')->name('store.kategori');
        Route::put('/kategori/update/{id}', 'update_kategori')->name('update.kategori');
        Route::get('/kategori/delete/{id}', 'delete_kategori')->name('delete.kategori');

        // Routes untuk Pembayaran
        Route::get('/bank', 'index_pembayaran')->name('index.pembayaran');
        Route::post('/pembayaran/store', 'store_pembayaran')->name('store.pembayaran');
        Route::put('/pembayaran/update/{id}', 'update_pembayaran')->name('update.pembayaran');
        Route::get('/pembayaran/delete/{id}', 'delete_pembayaran')->name('delete.pembayaran');

        // Routes untuk Supplier
        Route::get('/supplier', 'index_supplier')->name('index.supplier');
        Route::post('/supplier/store', 'store_supplier')->name('store.supplier');
        Route::put('/supplier/update/{id}', 'update_supplier')->name('update.supplier');
        Route::get('/supplier/delete/{id}', 'delete_supplier')->name('delete.supplier');

        // Routes untuk Brand
        Route::get('/brand', 'index_brand')->name('index.brand');
        Route::post('/brand/store', 'store_brand')->name('store.brand');
        Route::put('/brand/update/{id}', 'update_brand')->name('update.brand');
        Route::get('/brand/delete/{id}', 'delete_brand')->name('delete.brand');

        // Routes untuk Satuan
        Route::get('/satuan', 'index_satuan')->name('index.satuan');
        Route::post('/satuan/store', 'store_satuan')->name('store.satuan');
        Route::put('/satuan/update/{id}', 'update_satuan')->name('update.satuan');
        Route::get('/satuan/delete/{id}', 'delete_satuan')->name('delete.satuan');

        // Routes untuk pelanggan
        Route::get('/pelanggan', 'index_pelanggan')->name('index.pelanggan');
        Route::post('/pelanggan/store', 'store_pelanggan')->name('store.pelanggan');
        Route::put('/pelanggan/update/{id}', 'update_pelanggan')->name('update.pelanggan');
        Route::get('/pelanggan/delete/{id}', 'delete_pelanggan')->name('delete.pelanggan');

        // Routes untuk produk
        Route::get('/produk', 'index_produk')->name('index.produk');
        Route::post('/produk/store', 'store_produk')->name('store.produk');
        Route::put('/produk/update/{id}', 'update_produk')->name('update.produk');
        Route::get('/produk/delete/{id}', 'delete_produk')->name('delete.produk');

        // Routes untuk jenis/transaksi
        Route::get('/jenis/transaksi', 'index_jenis_transaksi')->name('index.jenis_transaksi');
        Route::post('/jenis/transaksi/store', 'store_jenis_transaksi')->name('store.jenis_transaksi');
        Route::put('/jenis/transaksi/update/{id}', 'update_jenis_transaksi')->name('update.jenis_transaksi');
        Route::get('/jenis/transaksi/delete/{id}', 'delete_jenis_transaksi')->name('delete.jenis_transaksi');


        // Routes untuk Merk
        Route::get('/merk', 'index')->name('master.merk');
        Route::get('/merk/add', 'add')->name('master.add');
        Route::POST('/merk/store', 'store')->name('master.store');
        Route::get('/merk/edit/{id}', 'edit')->name('master.edit');
        Route::post('/merk/update/{id}', 'update')->name('master.update');
        Route::get('/merk/delete/{id}', 'delete')->name('master.delete');

        Route::get('/jenis', 'index_jenis')->name('master.jenis');
        Route::get('/jenis/add', 'add_jenis')->name('master.add.jenis');
        Route::POST('/jenis/store', 'store_jenis')->name('master.store.jenis');

        // Routes untuk Mobil Bekas (Mokas)
        Route::get('mokas/add', 'add_uc')->name('master.add_uc');
        Route::post('mokas/store', 'store_uc')->name('master.store_uc');
        Route::get('mokas', 'index_json')->name('master.json');
        Route::get('mokas/edit/{id}', 'edit_uc')->name('master.mokas.edit');
        Route::post('mokas/update/{id}', 'update_uc')->name('master.mokas.update');

        Route::get('/test',  'export_stock')->name('export.stock');

        // Route untuk Update Status
        Route::post('update-status/{id}', 'updateStatus')->name('update_status');

        // Route untuk Update Data
        Route::put('mokas/update/modal{id}', 'updateData')->name('master.mokas.modal');

        // Route untuk Get Sales
        Route::get('get/sales', 'getSales')->name('getSales');

        // Route untuk Logout
        Route::get('logout', 'logout')->name('Logout');

        // Route untuk Get All Data
        Route::get('get-all-data', 'get_allData')->name('get.allData');

        Route::get('/report-stock', 'report_stock')->name('report_stock');

        Route::get('export/inventory', 'exportInventory')->name('export.inventory');
    });

    Route::controller(PagesRoleController::class)->group(function () {
        // Permission Route
        Route::get('/permission/index',  'index')->name('permission.index');
        Route::get('/permission/index1',  'index1')->name('permission.index1');
        Route::post('/permission/store',  'StorePermission')->name('permission.store');
        Route::post('/permission/update/{id}',  'UpdatePermission')->name('permission.update');
        Route::get('/permission/delete/{id}',  'DeletePermission')->name('permission.delete');
        // Route::get('/permission/add',  'Add')->name('permission.add');
        // Route::get('/permission/edit/{id}',  'EditPermission')->name('permission.edit');

        // Role
        Route::get('/roles/index',  'RoleIndex')->name('roles.index');
        Route::get('/roles/index1',  'RoleIndex1')->name('roles.index');
        Route::get('/roles/add',  'RoleAdd')->name('roles.add');
        Route::post('/roles/store',  'RoleStore')->name('roles.store');
        Route::get('/roles/edit/{id}',  'RoleEdit')->name('roles.edit');
        Route::post('/roles/update/{id}',  'RoleUpdate')->name('roles.update');
        Route::get('/roles/delete/{id}',  'RoleDeleted')->name('roles.delete');

        // Role dan Permission
        Route::get('/roles/permission/all',  'AllRolePermission')->name('all.roles.permission');
        Route::get('/roles/permission/all1',  'AllRolePermission1')->name('all.roles.permission1');
        Route::get('/roles/permission/add',  'AddRolePermission')->name('add.roles.permission');
        Route::post('/roles/permission/store',  'StoreRolePermission')->name('store.roles.permission');

        Route::get('/admin/permission/edit/{id}',  'EditRolePermission')->name('edit.roles.permission');
        Route::get('/admin/permission/edit1/{id}',  'EditRolePermission1')->name('edit.roles.permission1');
        Route::post('/admin/permission/update/{id}',  'UpdateRolePermission')->name('admin.roles.update');
        Route::get('/admin/permission/delete/{id}',  'DeleteRolePermission')->name('admin.roles.delete');

        // Users
        Route::get('/users/index',  'UsersIndex')->name('roles.index');
    });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::controller(UsersNewController::class)->group(function () {
        // Users
        Route::get('/users/index',  'index')->name('users.index');
        Route::get('/users/add',  'add')->name('users.add');
        Route::get('/users/edit/{id}',  'edit')->name('users.edit');
        Route::post('/users/store', 'store')->name('user.store');
        Route::post('/users/update/{id}', 'update')->name('user.update');
        Route::get('/users/delete/{id}', 'destroy')->name('user.delete');
    });

    Route::controller(FinanceController::class)->group(function () {
        Route::get('/finance/pembelian', 'index_pembelian')->name('finance.index');
        Route::get('/finance/pembelian/add', 'add_pembelian')->name('finance.add');
        Route::post('/finance/pembelian/store', 'store_pembelian')->name('finance.store');
        Route::get('/finance/pembelian/edit/{id}', 'edit_pembelian')->name('finance.edit');
        Route::post('/finance/pembelian/update/{id}', 'update_pembelian')->name('finance.update');
        Route::get('/finance/pembelian/delete/{id}', 'delete_pembelian')->name('finance.delete');
        Route::post('/finance/updatesubtotal/{id}',  'update_subtotal')->name('finance.update.subtotal');

        // Penjualan
        Route::get('/finance/penjualan', 'index_penjualan')->name('finance.penjualan.index');
        Route::get('/finance/penjualan/add', 'add_penjualan')->name('finance.penjualan.add');
        // Route untuk cek produk by jenis transaksi
        Route::get('/produk-by-jenis/{id}', 'getProdukByJenis')->name('produk.by.jenis');
        Route::get('/produk/{id}/harga-beli', 'getHargaBeli')->name('produk.harga.beli');
        Route::POST('/finance/penjualan/store', 'store_penjualan')->name('finance.penjualan.store');
        Route::get('/finance/penjualan/delete/{id}', 'delete_penjualan')->name('finance.penjualan.delete');
    });
});


require __DIR__ . '/auth.php';
