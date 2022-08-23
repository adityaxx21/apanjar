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
        Schema::create('tb_katalogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_id')->references('id')->on('tb_jenis')->onDelete('cascade');
            $table->string('nama_item');
            $table->text('gambar');
            $table->integer('harga');
            $table->text('deskripsi');
            $table->string('satuan');
            $table->rememberToken();
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
        Schema::dropIfExists('tb_katalogs');
    }
};
