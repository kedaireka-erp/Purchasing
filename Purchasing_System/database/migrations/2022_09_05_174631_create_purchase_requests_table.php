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
        Schema::create('purchase_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->nullable();
            $table->string("no_pr",255)->nullable();
            $table->date("deadline_date")->nullable();
            $table->string("requester")->nullable();
            $table->string("project")->nullable();
            $table->text("note")->nullable();
            $table->string("attachment")->nullable();
            $table->enum('approval_status', ['pending', 'approve','ignore'])->default('pending');  
            $table->softDeletes();
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
        Schema::dropIfExists('purchase_requests');
    }
};