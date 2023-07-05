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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedBigInteger('peran_id')->nullable(); //peran atau role
            $table->unsignedBigInteger('anggota_id')->nullable(); //tidak terlalu penting
            $table->timestamps();

            // Tambahkan foreign key untuk kolom peran_id
            $table->foreign('peran_id')->references('id')->on('peran')->onDelete('SET NULL');
            $table->foreign('anggota_id')->references('id')->on('anggota')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
