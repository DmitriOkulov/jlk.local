<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLaserEpilationsTableAddZone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('laser_epilations', function (Blueprint $table) {
            $table->string('old_zone')->nullable()->change();
            $table->string('zone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('laser_epilations', function (Blueprint $table) {
            $table->dropColumn('zone');
        });
    }
}
