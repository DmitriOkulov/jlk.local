<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaserEpilationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laser_epilations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('zone');
            $table->string('percent');
            $table->string('ms')->nullable();
            $table->string('gc')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();

            $table->bigInteger('id_visitor')->unsigned();
            $table->foreign('id_visitor')->references('id')->on('visitors');

            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laser_epilations');
    }
}
