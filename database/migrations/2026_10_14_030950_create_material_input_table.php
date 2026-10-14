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
        Schema::create('material_input', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lap_harian_id')
                ->constrained('lap_harian')
                ->cascadeOnDelete();

            $table->foreignId('material_id')
                ->constrained('material');

            $table->decimal('jumlah', 12, 2);

            $table->foreignId('unit_id')
                ->constrained('unit');

            $table->timestamps();

            $table->unique([
                'lap_harian_id',
                'material_id',
                'unit_id',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_input');
    }
};
