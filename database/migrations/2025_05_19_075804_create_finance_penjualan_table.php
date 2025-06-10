<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('finance_penjualan', function (Blueprint $table) {
            $table->string('id');
            $table->unsignedBigInteger('pembayaran_id')->nullable();
            $table->unsignedBigInteger('pelanggan_id')->nullable();
            $table->unsignedBigInteger('jenis_transaksi_id')->nullable();
            $table->date('tanggal')->nullable();
            $table->double('subtotal')->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('status')->default(0)->comment('0 = draft, 1 = proses, 2 = selesai', '3 = batal');
            $table->integer('status_closing')->default(0)->comment('0 = open, 1 = closed');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('closed_by')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('finance_penjualan');
    }
};
