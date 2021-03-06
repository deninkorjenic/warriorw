<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('weeks')) {
            Schema::create('weeks', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->string('description');
                // TODO: Rename to just 'number'
                $table->integer('week_number');
                $table->integer('maximum_points')->nullable()->default(0);
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
        Schema::dropIfExists('weeks');
    }
}
