<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisionQuizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('quizes')) {
            Schema::create('quizes', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('week_id')->unsigned()->index();
                $table->string('question');
                $table->json('answers');
                $table->string('correct_answer');
                $table->integer('points');
                $table->timestamps();
            });
        }
        // We need to add quiz_id to weeks table
        if(Schema::hasTable('weeks')) {
            if(!Schema::hasColumn('weeks', 'quiz_id')) {
                Schema::table('weeks', function(Blueprint $table) {
                    $table->integer('quiz_id')->unsigned()->index()->nullable();
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizes');
        if(Schema::hasTable('weeks')) {
            if(Schema::hasColumn('weeks', 'quiz_id')) {
                Schema::table('weeks', function(Blueprint $table) {
                    $table->dropColumn('quiz_id');
                });
            }
        }
    }
}
