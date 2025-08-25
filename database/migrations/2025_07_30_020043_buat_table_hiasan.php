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
        Schema::create('tipe', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('tipe');
            $table->timestamps();
        });
        Schema::create('hiasan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->text('hiasan');
            $table->tinyInteger('urutan')->default(0);
            $table->uuid('tipe_id');
            $table->uuid('tema_id');
            $table->timestamps();

            $table->foreign('tipe_id')
                ->references('id')->on('tipe')
                ->onDelete('cascade');

            $table->foreign('tema_id')
                ->references('id')->on('tema')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hiasan');
        Schema::dropIfExists('tipe');
    }
};
