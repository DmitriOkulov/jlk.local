<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContraindicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contraindications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->text('value');

            $table->text('comment')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('contraindications');
    }
}
