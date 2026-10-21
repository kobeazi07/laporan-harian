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
        Schema::create('twork_inputs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lap_harian_id')
                ->constrained('lap_harian')
                ->cascadeOnDelete();

            $table->foreignId('type_work_id')
                ->constrained('type_work')
                ->cascadeOnDelete();

            $table->timestamps();

            $table->unique(['lap_harian_id', 'type_work_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('twork_inputs');
    }
};
