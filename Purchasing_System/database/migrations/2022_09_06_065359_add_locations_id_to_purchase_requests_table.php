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


            $table->unsignedBigInteger("locations_id")->default(1)->after("id");
            $table->foreign("locations_id")->references("id")->on("locations")->onDelete("restrict")->onUpdate("cascade");

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
            $table->dropForeign("puchase_requests_locations_id_foreign");
            $table->dropForeign("locations_id");

        });
    }
};