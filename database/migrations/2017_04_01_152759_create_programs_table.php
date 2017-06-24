<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->integer('current_week')->default(0);
            $table->json('schedule')->nullable();
            $table->string('adherence')->default('normal'); // sad, normal, happy
            $table->integer('total_score')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // TODO Used from old bitbucket migrations, Denin should explain about new database schema
            $table->integer('program_type')->nullable();
            for($i=0; $i<16; $i++) {
                $table->json('week_' . $i)->nullable();
            }
            for($i=1; $i<16; $i++) {
                $table->json('rq_' . $i)->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
