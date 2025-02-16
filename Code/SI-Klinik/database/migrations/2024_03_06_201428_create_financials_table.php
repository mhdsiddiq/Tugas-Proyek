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
        Schema::create('financials', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('transaksi_id'); // Foreign key ke tabel transactions
            $table->decimal('total_uang', 15, 2); // Kolom untuk menyimpan total uang
            $table->string('note')->nullable(); // Kolom untuk menyimpan catatan (note)
            $table->timestamps(); // Kolom created_at dan updated_at

            // Definisi foreign key ke tabel transactions
            $table->foreign('transaksi_id')->references('id')->on('transactions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financials');
    }
};
