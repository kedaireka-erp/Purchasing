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
        Schema::create('powders', function (Blueprint $table) {
            $table->id();
            $table->string('warna', 100)->nullable();
            $table->string('kode_warna', 100)->nullable();
            $table->string('finish', 100)->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('m2')->nullable();
            $table->integer('estimasi')->nullable();
            $table->integer('fresh')->nullable();
            $table->integer('recycle')->nullable();
            $table->string('alokasi')->nullable();
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
        Schema::dropIfExists('powders');
    }
};
