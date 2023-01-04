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
        Schema::create('todolist', function (Blueprint $table) {
            $table->id();
            $table->string('todolist');
            $table->integer('durasi');
            $table->timestamps();

            $table->unsignedBigInteger('kategori_id');     
            $table->foreign('kategori_id')->references('id')->on('kategori');
            $table->unsignedBigInteger('tanggal_id');     
            $table->foreign('tanggal_id')->references('id')->on('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todolist');
    }
};
