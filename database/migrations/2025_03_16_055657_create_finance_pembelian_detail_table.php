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
            $table->string('pembelian_id');
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->integer('qty')->nullable();
            $table->double('harga')->nullable();
            $table->double('diskon')->nullable();
            $table->double('total')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('finance_pembelian_detail');
    }
};
