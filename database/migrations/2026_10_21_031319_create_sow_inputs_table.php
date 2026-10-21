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
        Schema::create('sow_inputs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lap_harian_id')
                ->constrained('lap_harian')
                ->cascadeOnDelete();

            $table->foreignId('sow_id')
                ->constrained('scope_work')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['lap_harian_id', 'sow_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sow_inputs');
    }
};
