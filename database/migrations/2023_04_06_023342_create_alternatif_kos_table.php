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
            $table->bigInteger('kriteria_id')->unsigned();
            $table->foreign('kriteria_id')->references('id')->on('kriterias');
            $table->bigInteger('sub_kriteria_id')->unsigned();
            $table->foreign('sub_kriteria_id')->references('id')->on('sub_kriterias');
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
