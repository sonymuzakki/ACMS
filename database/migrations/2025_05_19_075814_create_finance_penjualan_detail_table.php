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
        Schema::create('finance_penjualan_detail', function (Blueprint $table) {
            $table->string('id');
            $table->string('penjualan_id');
            $table->unsignedBigInteger('produk_id');
            $table->integer('qty');
            $table->double('harga_beli')->nullable();
            $table->double('harga_jual')->nullable();
            $table->double('total');
            $table->string('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finance_penjualan_detail');
    }
};
