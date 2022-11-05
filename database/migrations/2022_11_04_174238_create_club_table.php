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
        Schema::create('club', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug');
            $table->string('no_tlp')->nullable();
            $table->string('email')->nullable();
            $table->string('lokasi')->nullable();
            $table->date('tahun_terbentuk')->nullable();
            $table->string('alamat')->nullable();
            $table->longText('sejarah')->nullable();
            $table->string('logo')->nullable();
            $table->string('background')->nullable();
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
        Schema::dropIfExists('club');
    }
};