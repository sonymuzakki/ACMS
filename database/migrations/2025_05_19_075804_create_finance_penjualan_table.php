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
            $table->date('tanggal')->nullable();
            $table->double('total')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_penjualan');
    }
};
