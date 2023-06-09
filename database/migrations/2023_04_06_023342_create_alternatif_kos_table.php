<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alternatif_kos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kos');
            $table->string('jenis_kos');
            $table->string('alamat');
            $table->bigInteger('pemilik_id')->unsigned();
            $table->foreign('pemilik_id')->references('id')->on('pemiliks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif_kos');
    }
};
