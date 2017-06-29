<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tasks')) {
            Schema::create('tasks', function (Blueprint $table) {
                $table->increments('id');
                $table->string('description');
                $table->integer('points');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('task_week')) {
            Schema::create('task_week', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('task_id')->unsigned()->index();
                $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
                $table->integer('week_id')->unsigned()->index();
                $table->foreign('week_id')->references('id')->on('weeks')->onDelete('cascade');
                $table->boolean('completed')->default(false);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('task_week');
        Schema::drop('tasks');
    }
}
