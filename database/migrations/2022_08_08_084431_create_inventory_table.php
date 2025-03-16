<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->string('nopol')->nullable();
            $table->string('km')->nullable();
            $table->string('no_rangka')->nullable();
            $table->bigInteger('merk_id')->unsigned();
            $table->string('model')->nullable();
            $table->string('warna')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('transmisi')->nullable();
            $table->date('tgl_beli')->nullable();
            $table->string('penjual')->nullable();
            $table->string('harga_beli')->nullable();
            $table->integer('harga_jual')->nullable();
            $table->string('status')->default(0)->comment('0=available, 1=proses ,2=terjual');
            $table->string('sales')->nullable();
            $table->string('spv')->nullable();
            $table->string('jenis_pembelian')->nullable();
            $table->string('nama_customer')->nullable();
            $table->integer('komisi')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('grade')->nullable();
            $table->string('image')->nullable();
            $table->string('simulasi')->nullable();
            $table->string('leasing')->nullable();
            $table->integer('dp_setor')->nullable();
            $table->integer('angsuran')->nullable();
            $table->string('tenor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventory');
    }
};
