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
        Schema::create('powders', function (Blueprint $table) {
            $table->id();
            $table->date('deadline_date');
            $table->string('requester');
            $table->string('project');
            $table->unsignedBigInteger('id_grade')->nullable();
            $table->unsignedBigInteger('id_supplier')->nullable();
            $table->string('note');
            $table->string('attachment');
            $table->string('warna');
            $table->string('kode_warna');
            $table->string('finish');
            $table->string('quantity');
            $table->string('m2');
            $table->string('estimasi');
            $table->string('fresh');
            $table->string('recycle');
            $table->string('alokasi');
            $table->enum('status', ['pending', 'approve', 'ignore'])->default('pending');
            $table->timestamps();
            $table->foreign("id_grade")->references("id")->on("grades")->onDelete("restrict")->onUpdate("cascade")->nullable();
            $table->foreign("id_supplier")->references("id")->on("suppliers")->onDelete("restrict")->onUpdate("cascade")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('powders');
    }
};
