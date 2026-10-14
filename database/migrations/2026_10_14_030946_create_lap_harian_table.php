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
        Schema::create('lap_harian', function (Blueprint $table) {
            $table->id();

            $table->string('judul');
            $table->text('keterangan')->nullable();
            $table->text('instruksi_catatan')->nullable();

            $table->foreignId('created_by')
                ->constrained('users');

            $table->string('nomor', 100)->unique();
            $table->date('tanggal');

            $table->foreignId('approved_by')
                ->nullable()
                ->constrained('users');

            $table->foreignId('konsultan_pengawas_id')
                ->nullable()
                ->constrained('konsultan_pengawas');

            $table->foreignId('owner_id')
                ->nullable()
                ->constrained('owner');

            $table->foreignId('kontraktor_pelaksana_id')
                ->nullable()
                ->constrained('kontraktor_pelaksana');

            $table->integer('sisa_waktu')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lap_harian');
    }
};
