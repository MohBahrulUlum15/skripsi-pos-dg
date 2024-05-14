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
        Schema::create('balitas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P',]);
            $table->float('bb_lahir');
            $table->float('tb_lahir');
            $table->foreignId('orangtua_id')->constrained('orangtuas')->onDelete('cascade');
            $table->foreignId('posyandu_id')->constrained('posyandus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balitas');
    }
};
