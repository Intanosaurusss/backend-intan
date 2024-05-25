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
        Schema::create('data_servis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('kode_barang');
            $table->string('kerusakan');
            $table->string('deskripsi');
            $table->dateTime('mulai')->nullable();
            $table->dateTime('selesai')->nullable();
            $table->string('teknisi')->nullable();
            $table->string('biaya')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_servis');
    }
};
