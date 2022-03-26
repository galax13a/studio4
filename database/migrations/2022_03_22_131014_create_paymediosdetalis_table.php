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
        Schema::create('paymediosdetails', function (Blueprint $table) {
            $table->integerIncrements("id");   
            $table->string('name')->index();
            $table->string('account')->defaultValue(0)->nullable();
            $table->string('data1')->defaultValue(0)->nullable();
            $table->string('data2')->defaultValue(0)->nullable();
            $table->string('data3')->defaultValue(0)->nullable();
            $table->boolean('status')->nullable()->defaultValue(true); //eliminacion 
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->foreign('studio_id')->references('id')->on('estudios')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->foreign('model_id')->references('id')->on('modelos');
            $table->unsignedInteger('paymedio_id')->nullable();
            $table->foreign('paymedio_id')->references('id')->on('paymedios');
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
        Schema::dropIfExists('paymediosdetalis');
    }
};
