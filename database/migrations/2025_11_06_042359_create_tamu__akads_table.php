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
        Schema::create('tamu__akads', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tamu_akad');
            $table->string('alamat');
            $table->enum('kehadiran', ['hadir', 'tidak'])->default('tidak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tamu__akads');
    }
};
