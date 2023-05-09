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
        Schema::create('pekerjaan_warga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('warga', 'id')->onDelete('cascade')->onUpdate('cascade');
            $table->string('pekerjaan');
            $table->string('alamat', 255);
            $table->string('gaji');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pekerjaan_warga');
    }
};
