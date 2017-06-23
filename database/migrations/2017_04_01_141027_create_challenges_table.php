<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('user_id');
            $table->boolean('challenges_set_up')->default(0);
            $table->json('challenge_1')->nullable();
            $table->json('challenge_2')->nullable();
            $table->json('challenge_3')->nullable();
            $table->json('challenge_4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challenges');
    }
}
