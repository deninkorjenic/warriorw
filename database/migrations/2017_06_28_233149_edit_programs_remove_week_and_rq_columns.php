<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditProgramsRemoveWeekAndRqColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('programs')) {
            Schema::table('programs', function(Blueprint $table) {
                $columns = [];
                for($i=0; $i<16; $i++) {
                    array_push($columns, 'week_' .$i);
                }
                $table->dropColumn($columns);

                // Droping rq_1, rq_2, etc.
                $columns = [];
                for($i=1; $i<16; $i++) {
                    array_push($columns, 'rq_' .$i);
                }
                $table->dropColumn($columns);
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
