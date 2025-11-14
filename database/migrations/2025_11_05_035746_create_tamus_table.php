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
        Schema::create('tamus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tamu')->index();
            $table->integer('nomor_meja')->nullable()->index();
            $table->string('alamat')->nullable()->index();
            $table->string('status')->nullable()->index();
            $table->enum('status_tamu', ['stay', 'pulang'])->default('stay');
            $table->enum('kehadiran', ['hadir', 'tidak'])->default('tidak')->index();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tamus');
    }
};
