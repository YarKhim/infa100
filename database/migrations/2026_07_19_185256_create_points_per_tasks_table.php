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
        Schema::create('points_per_tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('subject_id');
            $table->integer('task_number');
            $table->integer('max_points');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('points_per_tasks');
    }
};
