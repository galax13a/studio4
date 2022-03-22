<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conexions', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->date("date")->index();
            $table->smallInteger('time_page');
            $table->smallInteger('time_real');
            $table->smallInteger('time_min');
            $table->time("timebrb")->nullable();
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->foreign('studio_id')->references('id')->on('estudios');
            $table->unsignedBigInteger('model_id')->nullable();
            $table->foreign('model_id')->references('id')->on('modelos');
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
        Schema::dropIfExists('conexions');
    }
};
