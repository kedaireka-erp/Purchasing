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
        Schema::create('item_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_request")->nullable();
            $table->unsignedBigInteger("id_item")->nullable();
            $table->unsignedBigInteger("powder_id")->nullable();
            $table->timestamps();
            
            $table->string("no_po")->nullable();
            $table->string("supplier")->nullable();
            $table->string("nama_supplier")->nullable();
            $table->unsignedBigInteger("id_waktu")->nullable();
            $table->unsignedBigInteger("id_pembayaran")->nullable();
            $table->string("alamat_penagihan")->nullable();
            $table->string("lain-lain")->nullable();
            $table->string("note")->nullable();
            $table->string("signature")->nullable();
            $table->string("nama")->nullable();


            $table->foreign("powder_id")->references("id")->on("powders")->onDelete("restrict")->onUpdate("cascade")->nullable();
            $table->foreign("id_request")->references("id")->on("purchase_requests")->onDelete("restrict")->onUpdate("cascade")->nullable();
            $table->foreign("id_item")->references("id")->on("items")->onDelete("restrict")->onUpdate("cascade")->nullable();
            $table->foreign("id_waktu")->references("id")->on("timeshippings")->onDelete("restrict")->onUpdate("cascade")->nullable();
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
        Schema::dropIfExists('item_requests');
    }
};
