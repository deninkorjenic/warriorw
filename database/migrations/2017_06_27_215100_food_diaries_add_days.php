<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FoodDiariesAddDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasColumn('food_diaries', 'day_1')) {
            Schema::table('food_diaries', function(Blueprint $table) {
                $table->json('day_1')->nullable();
            });
        }
        if(!Schema::hasColumn('food_diaries', 'day_2')) {
            Schema::table('food_diaries', function(Blueprint $table) {
                $table->json('day_2')->nullable();
            });
        }
        if(!Schema::hasColumn('food_diaries', 'day_3')) {
            Schema::table('food_diaries', function(Blueprint $table) {
                $table->json('day_3')->nullable();
            });
        }
        if(!Schema::hasColumn('food_diaries', 'day_4')) {
            Schema::table('food_diaries', function(Blueprint $table) {
                $table->json('day_4')->nullable();
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
        if(Schema::hasColumn('food_diaries', 'day_1')) {
            Schema::table('food_diaries', function(Blueprint $table) {
                $table->dropColumn('day_1');
            });
        }
        if(Schema::hasColumn('food_diaries', 'day_2')) {
            Schema::table('food_diaries', function(Blueprint $table) {
                $table->dropColumn('day_2');
            });
        }
        if(Schema::hasColumn('food_diaries', 'day_3')) {
            Schema::table('food_diaries', function(Blueprint $table) {
                $table->dropColumn('day_3');
            });
        }
        if(Schema::hasColumn('food_diaries', 'day_4')) {
            Schema::table('food_diaries', function(Blueprint $table) {
                $table->dropColumn('day_4');
            });
        }
    }
}
