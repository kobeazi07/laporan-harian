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
        Schema::create('cuaca', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lap_harian_id')
                ->unique()
                ->constrained('lap_harian')
                ->cascadeOnDelete();

            $table->string('pagi', 100)->nullable();
            $table->string('siang', 100)->nullable();
            $table->string('sore', 100)->nullable();
            $table->string('malam', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuaca');
    }
};
