<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEduTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('edu_tasks')) {
            Schema::create('edu_tasks', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
                $table->string('description');
                $table->string('video_url');
                $table->integer('points');
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
        Schema::dropIfExists('edu_tasks');
    }
}
