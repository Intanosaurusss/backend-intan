<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPeminjamanTable extends Migration
{
    public function up()
    {
        Schema::create('data_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Add this line
            $table->string('nama');
            $table->string('kelas');
            $table->string('nama_barang');
            $table->string('merek');
            $table->string('kode');
            $table->dateTime('tanggal_pinjam')->nullable();
            $table->string('status')->default('dipinjam');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Add foreign key constraint
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_peminjaman');
    }
};
