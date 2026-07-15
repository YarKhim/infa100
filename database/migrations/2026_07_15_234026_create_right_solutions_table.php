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
        Schema::create('right_solutions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('task_id');
            $table->longText('solution');
            $table->string('files_path')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('right_solutions');
    }
};
