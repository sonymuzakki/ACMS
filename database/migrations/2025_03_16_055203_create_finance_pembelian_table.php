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
        Schema::create('finance_pembelian', function (Blueprint $table) {
            $table->string('id');
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('pembayaran_id')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('no_invoice')->nullable();
            $table->double('subtotal')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->foreign('supplier_id')->references('id')->on('master_supplier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_pembelian');
    }
};
