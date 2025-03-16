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
use App\Http\Controllers\Pages\RoleController as PagesRoleController;
use App\Http\Controllers\Pages\UsersNewController;
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
        Route::get('/barang', 'index_barang')->name('index.barang');
        Route::post('/barang/store', 'store_barang')->name('store.barang');
        Route::put('/barang/update/{id}', 'update_barang')->name('update.barang');
        Route::get('/barang/delete/{id}', 'delete_barang')->name('delete.barang');

         // Routes untuk Pembayaran
         Route::get('/pembayaran', 'index_pembayaran')->name('index.pembayaran');
         Route::post('/pembayaran/store', 'store_pembayaran')->name('store.pembayaran');
         Route::put('/pembayaran/update/{id}', 'update_pembayaran')->name('update.pembayaran');
         Route::get('/pembayaran/delete/{id}', 'delete_pembayaran')->name('delete.pembayaran');

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

    Route::controller(AktifitasController::class)->group(function () {
        Route::get('/index', 'index')->name('aktifitas.index')->middleware('permission:aktifitas.jual.menu');
        Route::get('/aktifitas/add', 'add')->name('aktifitas.add');
        Route::get('/filter-aktifitas', 'filterAktifitas')->name('aktifitas.filter');

        Route::get('/prospecting-beli', 'index_beli')->name('aktifitas.beli');

        Route::get('/get-info-by-nopol/{id}', 'getInfoByNopol')->name('aktifitas.cekNopol');

        Route::post('/aktifitas/store', 'store')->name('aktifitas.store');

        Route::get('/funnel-chart', 'funnelChart')->name('chart');

        Route::get('aktifitas/exports',  'exports')->name('exports');

        Route::get('/api/spv', 'getSpv');
        Route::get('/api/sales-by-spv/{spvId}', 'getSalesBySpv');

        Route::get('/dashboard', 'dashboard')->name('dashboard');

        // Leads Sales From Tisas
        Route::get('/leads-sales', 'index_leads')->name('aktifitas.leads');
        Route::post('/update-status/{id}', 'updateStatus')->name('aktifitas.leads.update');
    });

    Route::controller(AktifitasBeliController::class)->group(function () {
        Route::get('/prospecting-beli', 'index')->name('prospecting.beli')->middleware('permission:aktifitas.beli.menu');
        Route::get('/prospecting-add', 'add')->name('prospecting.add');
        Route::POST('/prospecting-store', 'store')->name('prospecting.store');
        Route::get('/find-data', 'findData')->name('prospecting.find');
        Route::get('/export/beli', 'view')->name('export.beli');
        // export
        Route::get('export-prospek-beli', 'export')->name('prospekBeli.export');

    });

    Route::controller(SalesController::class)->group(function () {
        Route::get('/sales/index',  'getSales')->name('sales.index');
        Route::get('/spv/index',  'getSpv')->name('spv.index');
    });

    Route::controller(PengajuanController::class)->group(function () {
        Route::get('/pengajuan/index',  'index')->name('pengajuan.index');
        Route::get('/pengajuan/credit/add',  'AddPengajuan')->name('pengajuan.add');
        Route::POST('/pengajuan/credit/store',  'store')->name('pengajuan.store');
        Route::get('/pengajuan/credit/edit/{id}',  'EditPengajuan')->name('pengajuan.edit');
        Route::PUT('/pengajuan/credit/update/{id}',  'UpdatePengajuan')->name('pengajuan.update');

        Route::get('/get-no-spk-by-inventory/{id}', 'getNoSPKByInventory')->name('get.nospk');
    });

    Route::controller(PenjualanController::class)->group(function () {
        Route::get('/penjualan/index',  'index')->name('penjualan.index');
        Route::get('/penjualan/add',  'AddPenjualan')->name('penjualan.add');
        Route::POST('/penjualan/store',  'store')->name('penjualan.store');

        Route::get('/get-no-spk/{id}', 'getData')->name('get.getData');
        // Route::get('/get-no-spkcs/{id}', 'getDatacs')->name('get.getData');

        Route::get('/penjualan/export', 'viewExport')->name('penjualan.viewExport');

        // export
        Route::get('/export/all', 'export_all')->name('export.all');

        // view export
        Route::get('/export', 'view_export')->name('view.export');
        Route::get('/export/view', 'view')->name('view');

        Route::get('/report', 'report')->name('report');

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

    Route::controller(UsersNewController::class)->group(function () {
        // Users
        Route::get('/users/index',  'index')->name('users.index');
        Route::get('/users/add',  'add')->name('users.add');
        Route::get('/users/edit/{id}',  'edit')->name('users.edit');
        Route::post('/users/store', 'store')->name('user.store');
        Route::post('/users/update/{id}', 'update')->name('user.update');
        Route::get('/users/delete/{id}', 'destroy')->name('user.delete');
    });

});

require __DIR__ . '/auth.php';
