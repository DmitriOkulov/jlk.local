<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCavitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cavitations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('stomach');
            $table->string('ass');
            $table->string('hips');

            $table->bigInteger('id_visitor')->unsigned();

            $table->bigInteger('id_user')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cavitations');
    }
}
