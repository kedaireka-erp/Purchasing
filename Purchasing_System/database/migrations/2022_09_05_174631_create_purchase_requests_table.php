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
            $table->string("no_pr", 255)->nullable();
            $table->enum('type', ['powder', 'othergood'])->nullable();
            $table->date("deadline_date")->nullable();
            $table->string("requester")->nullable();
            $table->string("project")->nullable();
            $table->text("note")->nullable();
            $table->text("feedback_manager")->nullable();
            $table->text("feedback_purchasing")->nullable();
            $table->string("attachment")->nullable();
            $table->timestamp('tanggal_diterima')->nullable();
            $table->enum('approval_status', ['pending', 'edit','approve', 'reject'])->default('pending');
            $table->enum('accept_status', ['pending', 'edit', 'accept','reject'])->default('pending');
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
