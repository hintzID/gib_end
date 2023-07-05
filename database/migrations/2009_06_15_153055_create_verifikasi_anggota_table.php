<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifikasiAnggotaTable extends Migration
{
    public function up()
    {
        Schema::create('verifikasi_calon_anggota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calon_anggota_id');
            $table->boolean('verifikasi')->default(false);
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('calon_anggota_id')->references('id')->on('calon_anggota')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('verifikasi_calon_anggota');
    }
}

