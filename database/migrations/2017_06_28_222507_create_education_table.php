<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('educations')) {
            Schema::create('educations', function (Blueprint $table) {
                $table->increments('id');
                $table->string('description');
                $table->integer('points');
                $table->string('video_url');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('education_week')) {
            Schema::create('education_week', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('education_id')->unsigned()->index();
                $table->foreign('education_id')->references('id')->on('educations')->onDelete('cascade');
                $table->integer('week_id')->unsigned()->index();
                $table->foreign('week_id')->references('id')->on('weeks')->onDelete('cascade');
                $table->boolean('watched')->default(false);
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
