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
        Schema::create('trip_penyaluran_dana', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trip_id');
            $table->unsignedBigInteger('pondok_id');
            $table->integer('urutan_trip');
            $table->timestamps();

            $table->foreign('trip_id')->references('id')->on('daftar_trip')->onDelete('cascade');
            $table->foreign('pondok_id')->references('id')->on('pondok')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_penyaluran_dana');
    }
};
