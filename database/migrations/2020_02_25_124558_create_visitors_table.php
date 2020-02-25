<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('surname');
            $table->string('name');
            $table->string('patronymic')->nullable();
            $table->date('birthday')->nullable();
            $table->string('skin_color')->nullable();
            $table->string('hair_color')->nullable();
            $table->string('gormons')->nullable();
            $table->string('weight')->nullable();
            $table->string('contraindication')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
