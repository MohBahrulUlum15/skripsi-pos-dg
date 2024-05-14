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
            $table->unsignedBigInteger('orangtua_id');
            $table->unsignedBigInteger('posyandu_id');
            $table->timestamps();

            // Definisikan foreign key constraint
            $table->foreign('orangtua_id')->references('id')->on('orang_tuas')->onDelete('cascade');
            $table->foreign('posyandu_id')->references('id')->on('posyandus')->onDelete('cascade');
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
