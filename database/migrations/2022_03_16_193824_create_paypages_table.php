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
        Schema::create('paypages', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->date("date")->nullable();
            $table->double("value")->default(0);
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->foreign('studio_id')->references('id')->on('estudios');
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('modelos');
            $table->unsignedInteger('moneda_id');
            $table->foreign('moneda_id')->references('id')->on('monedas');
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
        Schema::dropIfExists('paypages');
    }
};
