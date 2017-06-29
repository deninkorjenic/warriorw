<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('trainings')) {
            Schema::create('trainings', function (Blueprint $table) {
                $table->increments('id');
                $table->string('description');
                $table->integer('points');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('training_week')) {
            Schema::create('training_week', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('training_id')->unsigned()->index();
                $table->foreign('training_id')->references('id')->on('trainings')->onDelete('cascade');
                $table->integer('week_id')->unsigned()->index();
                $table->foreign('week_id')->references('id')->on('weeks')->onDelete('cascade');
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
        //
    }
}
