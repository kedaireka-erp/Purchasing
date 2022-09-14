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
        Schema::table('purchase_requests', function (Blueprint $table) {
            $table->unsignedBigInteger("ships_id")->after("id");
            $table->foreign("ships_id")->references("id")->on("ships")->onDelete("restrict")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
            Schema::table('purchase_requests', function (Blueprint $table) {
                $table->dropForeign("puchase_requests_ships_id_foreign");
                $table->dropForeign("ships_id");

            });

    }
};