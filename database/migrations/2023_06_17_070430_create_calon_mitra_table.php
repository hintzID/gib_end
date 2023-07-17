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
        Schema::create('calon_mitra', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prioritas_id');
            $table->string('nama_pondok');
            $table->string('alamat');
            $table->date('tanggal_berdiri');
            $table->string('nama_pimpinan');
            $table->string('profesi');
            $table->string('alamat_pimpinan');
            $table->string('no_hp_pimpinan');
            $table->integer('jumlah_pengurus_menetap');
            $table->integer('jumlah_pengurus_tidak_menetap');
            $table->integer('jumlah_yatim_piatu');
            $table->integer('jumlah_yatim');
            $table->integer('jumlah_piatu');
            $table->integer('jumlah_mustahiq');
            $table->integer('jumlah_dll');
            $table->string('keterangan_jumlah_dll');
            $table->integer('jumlah_tk');
            $table->integer('jumlah_sd');
            $table->integer('jumlah_smp');
            $table->integer('jumlah_sma');
            $table->integer('jumlah_kuliah');
            $table->string('status_milik_tanah');
            $table->string('luas_tanah');
            $table->text('keterangan_fasilitas')->nullable();
            $table->string('sumber_air');
            $table->string('tingkat_layak');

            $table->timestamps();

            $table->foreign('prioritas_id')->references('id')->on('prioritas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_mitra');
    }
};
