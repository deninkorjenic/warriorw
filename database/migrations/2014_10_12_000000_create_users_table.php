<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->integer('program_id')->nullable();
            $table->integer('level')->default(0);
            $table->string('mobile_number')->nullable();
            $table->json('address')->nullable();
            $table->json('goals')->nullable();
            $table->json('security')->nullable();
            $table->json('screening_answers')->nullable();
            $table->boolean('finished_profile')->default(0);
            $table->timestamp('program_start')->nullable();
            $table->timestamp('week_one')->nullable();
            $table->timestamp('last_day')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
