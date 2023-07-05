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
        Schema::create('calon_anggota', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nama_lengkap');
            $table->string('gender');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat_lengkap');
            $table->string('status');
            $table->string('pekerjaan');
            $table->string('no_hp');
            $table->boolean('pilar_paskas')->default('false');
            $table->string('pilihan_kontribusi');
            $table->text('organisasi_diikuti');
            $table->text('tentang_paskas');
            $table->text('doa_harapan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_anggota');
    }
};
