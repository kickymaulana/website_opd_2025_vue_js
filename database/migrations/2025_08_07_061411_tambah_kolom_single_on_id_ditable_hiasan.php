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
        Schema::table('hiasan', function (Blueprint $table) {
            $table->uuid('single_page_id')->after('tema_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hiasan', function (Blueprint $table) {
            $table->dropColumn('single_page_id');
        });
    }
};
