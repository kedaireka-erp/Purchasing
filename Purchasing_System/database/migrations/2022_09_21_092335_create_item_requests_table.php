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
            $table->unsignedBigInteger("order_id")->nullable();
            $table->timestamps();
            
            
            $table->foreign("powder_id")->references("id")->on("powders")->onDelete("cascade")->onUpdate("cascade")->nullable();
            $table->foreign("id_request")->references("id")->on("purchase_requests")->onDelete("cascade")->onUpdate("cascade")->nullable();
            $table->foreign("id_item")->references("id")->on("items")->onDelete("cascade")->onUpdate("cascade")->nullable();
            $table->foreign("order_id")->references("id")->on("orders")->onDelete("cascade")->onUpdate("cascade")->nullable();
            
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
