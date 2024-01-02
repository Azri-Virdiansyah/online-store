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
        Schema::create('tbl_konfirmasi', function (Blueprint $table) {
            $table->id('id_konfirmasi');
            $table->string('id_user');
            $table->string('id_checkout');
            $table->string('bukti');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_konfirmasi');
    }
};
