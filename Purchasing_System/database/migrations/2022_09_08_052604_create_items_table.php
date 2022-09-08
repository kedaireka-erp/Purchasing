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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_request")->nullable();
            $table->unsignedBigInteger('id_master_item')->nullable();
            $table->integer('stok')->nullable();
            $table->unsignedBigInteger('id_satuan')->nullable();
            $table->timestamps();
            $table->foreign("id_request")->references("id")->on("purchase_requests")->onDelete("restrict")->onUpdate("cascade")->nullable();
            $table->foreign("id_master_item")->references("id")->on("master_items")->onDelete("restrict")->onUpdate("cascade")->nullable();
            $table->foreign("id_satuan")->references("id")->on("satuans")->onDelete("restrict")->onUpdate("cascade")->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
