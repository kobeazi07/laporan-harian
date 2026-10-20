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
        Schema::table('lap_harian', function (Blueprint $table) {
            // Hapus foreign key lama
            Schema::table('lap_harian', function (Blueprint $table) {
                $table->dropForeign(['konsultan_pengawas_id']);
                $table->dropForeign(['owner_id']);
                $table->dropForeign(['kontraktor_pelaksana_id']);
            });

            // Hapus kolom lama dan tambahkan project_id
            Schema::table('lap_harian', function (Blueprint $table) {
                $table->dropColumn([
                    'konsultan_pengawas_id',
                    'owner_id',
                    'kontraktor_pelaksana_id',
                ]);

                $table->foreignId('project_id')
                    ->nullable()
                    ->after('id')
                    ->constrained('project');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lap_harian', function (Blueprint $table) {
            $table->dropConstrainedForeignId('project_id');

            $table->foreignId('konsultan_pengawas_id')
                ->nullable()
                ->constrained('konsultan_pengawas');

            $table->foreignId('owner_id')
                ->nullable()
                ->constrained('owner');

            $table->foreignId('kontraktor_pelaksana_id')
                ->nullable()
                ->constrained('kontraktor_pelaksana');
        });
    }
};
