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
        Schema::create('kas_pengeluaran_sementaras', function (Blueprint $table) {
            $table->id();
            $table->string('uraian');
            $table->bigInteger('jumlah');
            $table->date('tanggal');
            $table->string('bukti')->nullable();
            $table->enum('status',['menunggu','ditolak'])->default('menunggu');
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
        Schema::dropIfExists('kas_pengeluaran_sementaras');
    }
};
