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
            $table->unsignedBigInteger("suppliers_id")->after("id")->nullable();
            $table->foreign("suppliers_id")->references("id")->on("suppliers")->onDelete("restrict")->onUpdate("cascade")->nullable();
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
