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
        Schema::create('alternatif_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alternatif');
            $table->unsignedBigInteger('id_kriteria');
            $table->unsignedBigInteger('id_subkriteria');
            $table->timestamps();

            $table->foreign('id_alternatif')->references('id')->on('alternatifs')->onDelete('cascade');
            $table->foreign('id_kriteria')->references('id')->on('kriterias');
            $table->foreign('id_subkriteria')->references('id')->on('sub_kriterias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatif_details');
    }
};
