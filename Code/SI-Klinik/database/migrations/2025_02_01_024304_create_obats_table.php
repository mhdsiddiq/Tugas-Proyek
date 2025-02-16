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
        Schema::create('obats', function (Blueprint $table) {
            $table->id(); // Menggunakan auto increment id
            $table->string('nama', 100); // Kolom 'nama' dengan tipe varchar(100)
            $table->date('tanggal_masuk'); // Kolom 'tanggal_masuk' dengan tipe date
            $table->date('tanggal_expire'); // Kolom 'tanggal_expire' dengan tipe date
            $table->string('satuan', 50); // Kolom 'satuan' dengan tipe varchar(50)
            $table->integer('jumlah'); // Kolom 'jumlah' dengan tipe int
            $table->timestamps(); // Kolom created_at dan updated_at secara otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
