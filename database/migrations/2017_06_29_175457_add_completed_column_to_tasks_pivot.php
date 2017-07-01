<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompletedColumnToTasksPivot extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(Schema::hasTable('task_week')) {
            if(!Schema::hasColumn('task_week', 'completed')) {
                Schema::table('task_week', function (Blueprint $table) {
                    $table->boolean('completed')->default(false);
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
        if(Schema::hasTable('task_week')) {
            if(Schema::hasColumn('task_week', 'completed')) {
                Schema::table('task_week', function (Blueprint $table) {
                    $table->dropColumn('completed');
                });
            }
        }
    }
}
