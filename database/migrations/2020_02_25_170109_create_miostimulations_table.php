<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMiostimulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miostimulations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('zone');
            $table->string('program');
            $table->string('power')->nullable();
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
        Schema::dropIfExists('miostimulations');
    }
}
