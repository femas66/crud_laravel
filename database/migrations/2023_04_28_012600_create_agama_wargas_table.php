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
            $table->unique('warga_id');
            $table->foreignId('warga_id')->constrained('warga', 'id')->onDelete('restrict')->onDelete('restrict');
            $table->string('agama_sekarang');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agama_warga');
    }
};
