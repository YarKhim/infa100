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
        Schema::create('subject_points_transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('subject_id');
            $table->integer('primary_sum');
            $table->integer('secondary_sum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_points_transfers');
    }
};
