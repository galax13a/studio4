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
        Schema::create('reintros', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->date("date");
            $table->time("time_intro");
            $table->time("time_salida");
            $table->string("day");
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->foreign('studio_id')->references('id')->on('estudios');
            $table->unsignedBigInteger('model_id');
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
        Schema::dropIfExists('reintros');
    }
};
