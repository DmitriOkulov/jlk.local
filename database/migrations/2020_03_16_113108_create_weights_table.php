<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weights', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->string('weight')->nullable();
            $table->string('left_triceps')->nullable();
            $table->string('right_triceps')->nullable();
            $table->string('waist')->nullable();
            $table->string('sides')->nullable();
            $table->string('ass')->nullable();
            $table->string('left_hip')->nullable();
            $table->string('right_hip')->nullable();
            $table->string('left_calf')->nullable();
            $table->string('right_calf')->nullable();
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
        Schema::dropIfExists('weights');
    }
}
