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
        Schema::create('hasil_fuzzies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemeriksaan_id')->constrained('pemeriksaans')->cascadeOnDelete();
            $table->float('status_gizi_bb_u');
            $table->string('deff_val_bb_u');
            $table->string('status_degree_bb_u');
            $table->float('status_gizi_tb_u');
            $table->string('deff_val_tb_u');
            $table->string('status_degree_tb_u');
            $table->float('status_gizi_bb_tb');
            $table->string('deff_val_bb_tb');
            $table->string('status_degree_bb_tb');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_fuzzies');
    }
};
