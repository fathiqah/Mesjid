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
        Schema::table('kas_pengeluaran_sementaras', function (Blueprint $table) {
            $table->string('sumber')->after('id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kas_pengeluaran_sementaras', function (Blueprint $table) {
            $table->dropColumn('sumber');
            
        });
    }
};
