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
        Schema::create('matrix_nilai_subkriterias', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('id_kriteria');
            $table->unsignedBigInteger('id_subkriteria');
            $table->double('nilai');
            $table->integer('urutan');
            $table->timestamps();

            $table->foreign('id_kriteria')->references('id')->on('kriterias')->onDelete('cascade');
            $table->foreign('id_subkriteria')->references('id')->on('sub_kriterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matrix_nilai_subkriterias');
    }
};
