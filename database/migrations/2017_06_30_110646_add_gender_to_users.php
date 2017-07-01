<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGenderToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('users')) {
            if(!Schema::hasColumn('users', 'gender')) {
                Schema::table('users', function(Blueprint $table) {
                    $table->string('gender')->nullable();
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
        if(Schema::hasTable('users')) {
            if(Schema::hasColumn('users', 'gender')) {
                Schema::table('users', function(Blueprint $table) {
                    $table->dropColumn('gender');
                });
            }
        }
    }
}
