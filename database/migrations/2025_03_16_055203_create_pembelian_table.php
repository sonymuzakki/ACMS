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
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('pembayaran_id');
            $table->date('tanggal');
            $table->string('no_invoice');
            $table->double('total');
            $table->string('created_by');
            $table->string('updated_by');
            $table->foreign('pembayaran_id')->references('id')->on('master_bayar');
            $table->foreign('supplier_id')->references('id')->on('master_supplier');
            $table->string('created_by');
            $table->string('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembelian');
    }
};
