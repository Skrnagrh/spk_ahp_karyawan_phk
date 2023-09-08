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
        Schema::create('nilai_prioritas_kriterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kriteria');
            $table->double('jml_nilai');
            $table->double('nilai_prioritas');
            $table->timestamps();

            $table->foreign('id_kriteria')->references('id')->on('kriterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_prioritas_kriterias');
    }
};
