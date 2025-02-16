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
        Schema::create('resep_obats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rekam_medis_id');
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('obat_id');
            $table->unsignedInteger('jumlah');
            $table->timestamps();

            // Definisikan foreign key jika tabel terkait sudah ada
            $table->foreign('rekam_medis_id')
                ->references('id')
                ->on('rekam_medis')
                ->onDelete('cascade');

            $table->foreign('obat_id')
                ->references('id')
                ->on('obats')
                ->onDelete('cascade');
            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep_obats');
    }
};
