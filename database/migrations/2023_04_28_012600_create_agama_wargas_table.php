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
        Schema::create('agama_warga', function (Blueprint $table) {
            $table->id();
            $table->integer('warga_id');
            $table->enum('agama_sekarang', ['islam', 'kristen', 'konghucu', 'hindu', 'budha']);
            $table->enum('agama_sebelumnya', ['islam', 'kristen', 'konghucu', 'hindu', 'budha']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agama_wargas');
    }
};