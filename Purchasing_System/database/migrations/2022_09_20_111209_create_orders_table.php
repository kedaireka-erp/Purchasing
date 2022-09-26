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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->nullable();
            $table->string("no_po")->nullable();
            $table->string("supplier")->nullable();
            $table->string("nama_supplier")->nullable();
            $table->unsignedBigInteger("id_waktu")->nullable();
            $table->unsignedBigInteger("id_alamat_kirim")->nullable();
            $table->unsignedBigInteger("id_pembayaran")->nullable();
            $table->string("alamat_penagihan")->nullable();
            $table->string("lain_lain")->nullable();
            $table->string("note")->nullable();
            $table->string("signature")->nullable();
            $table->string("nama")->nullable();
           
            $table->timestamps();

            $table->foreign("id_waktu")->references("id")->on("timeshippings")->onDelete("restrict")->onUpdate("cascade")->nullable();
            $table->foreign("id_alamat_kirim")->references("id")->on("locations")->onDelete("restrict")->onUpdate("cascade")->nullable();
            $table->foreign("id_pembayaran")->references("id")->on("payments")->onDelete("restrict")->onUpdate("cascade")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
