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
        Schema::create('hobi_warga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('warga', 'id')->onDelete('restrict')->onUpdate('restrict');
            $table->string('hobi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hobi_warga');
    }
};
