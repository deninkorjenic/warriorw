<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWatchedColumnToEducation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('education_week')) {
            if(!Schema::hasColumn('education_week', 'watched')) {
                Schema::table('education_week', function (Blueprint $table) {
                    $table->boolean('watched')->default(false);
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
        if(Schema::hasTable('education_week')) {
            if(Schema::hasColumn('education_week', 'watched')) {
                Schema::table('education_week', function (Blueprint $table) {
                    $table->dropColumn('watched');
                });
            }
        }
    }
}
