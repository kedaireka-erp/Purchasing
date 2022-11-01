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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_request');
            $table->enum('role', ['sales', 'finance','wirehouse']);
            $table->text('message');
            $table->string('status');
            $table->timestamps();

            $table->foreign("id_request")->references("id")->on("purchase_requests")->onDelete("restrict")->onUpdate("cascade")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
