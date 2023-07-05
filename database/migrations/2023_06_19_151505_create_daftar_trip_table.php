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
        Schema::create('daftar_trip', function (Blueprint $table) {
            $table->id();
            $table->string('nama_trip');
            $table->unsignedBigInteger('anggota_id');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('anggota_id')->references('id')->on('anggota')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_trip');
    }
};
