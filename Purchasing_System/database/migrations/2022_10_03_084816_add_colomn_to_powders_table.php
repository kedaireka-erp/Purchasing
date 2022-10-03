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
        Schema::table('powders', function (Blueprint $table) {
            $table->date('tanggal_kedatangan_barang')->nullable();
            $table->integer('outstanding')->nullable();
            $table->integer('sudah_datang')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('powders', function (Blueprint $table) {
            //
        });
    }
};
