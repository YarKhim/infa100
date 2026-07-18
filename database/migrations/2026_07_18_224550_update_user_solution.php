<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user_solutions', function (Blueprint $table) {
            $table->boolean('is_checked')
                ->default(false);
            $table->integer('points_after_check')
                ->default(0);
            $table->boolean('is_need_check')
                ->default(false);
            $table->unsignedInteger('tutor_id')
                ->nullable();
            $table->string('paths_checked_files')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_solutions', function (Blueprint $table) {
            //
        });
    }
};
