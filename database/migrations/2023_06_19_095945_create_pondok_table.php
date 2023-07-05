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
        Schema::create('pondok', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('calon_mitra_id');
            $table->string('contact_person');
            $table->string('no_hp_contact_person');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('calon_mitra_id')->references('id')->on('calon_mitra')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pondok');
    }
};
