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
        Schema::create('finance_pembelian_detail', function (Blueprint $table) {
            $table->string('id');
            $table->unsignedBigInteger('pembelian_id');
            $table->unsignedBigInteger('barang_id');
            $table->integer('qty');
            $table->double('harga');
            $table->double('diskon');
            $table->double('total');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->foreign('barang_id')->references('id')->on('master_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_pembelian_detail');
    }
};
