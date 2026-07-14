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
        Schema::table('option_solutions', function (Blueprint $table) {
            $table
                ->integer('primary_score')
                ->default(0);
            $table
                ->integer('secondary_score')
                ->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('option_solutions', function (Blueprint $table) {
            //
        });
    }
};
