<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramWeekPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('program_week')) {
            Schema::create('program_week', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('program_id')->unsigned()->index();
                $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
                $table->integer('week_id')->unsigned()->index();
                $table->foreign('week_id')->references('id')->on('weeks')->onDelete('cascade');

                $table->timestamps();
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
