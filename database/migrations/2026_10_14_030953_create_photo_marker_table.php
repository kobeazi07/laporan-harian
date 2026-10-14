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
        Schema::create('photo_marker', function (Blueprint $table) {
            $table->id();

            $table->foreignId('dokumentasi_id')
                ->constrained('dokumentasi')
                ->cascadeOnDelete();

            $table->time('jam')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('hari', 20)->nullable();
            $table->string('location')->nullable();
            $table->string('judul_dokumentasi')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_marker');
    }
};
