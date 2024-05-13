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
        Schema::create('keanggotaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('variabel_id')->constrained('variabels')->onDelete('cascade');
            $table->string('nama_keanggotaan');
            $table->string('nama_fungsi');
            $table->integer('bb_l');
            $table->integer('bt_l');
            $table->integer('ba_l');
            $table->integer('bb_p');
            $table->integer('bt_p');
            $table->integer('ba_p');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keanggotaans');
    }
};
