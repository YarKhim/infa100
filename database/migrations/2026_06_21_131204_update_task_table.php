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
        Schema::dropIfExists('tasks');
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_subject')->unsigned();
            $table->bigInteger('id_task_source')->unsigned();
            $table->enum('task_type', ['Задание с кратким ответом', 'Задание с развёрнутым ответом'])
                ->default('Задание с кратким ответом');//Задаём столбец с типом задачи
            $table->integer('task_number_in_the_kim');//Задаём столбец с номером задачи в КИМе
            $table->string('answer');
            $table->longText('condition');
            $table->enum('difficulty_level', [1, 2, 3, 4, 5])->default(3);//Задаём столбец с уровненем сложности задачи
            //(число от 1 до 5)
            $table->timestamps();
            //Задаём внешние ключи
            #$table->foreign('id_subject')->references('id')->on('subjects');//ID предмета
            #$table->foreign('id_task_source')->references('id')->on('task_sources');//ID источника задач
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
