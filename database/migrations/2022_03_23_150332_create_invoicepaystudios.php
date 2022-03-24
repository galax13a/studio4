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
        Schema::create('invoicepaystudios', function (Blueprint $table) {
            $table->bigIncrements("id");   
            $table->string('name');
            $table->date('date')->index();
            $table->float('payout')->defaultValue(0); // lo q se paga realmente en usd
            $table->float('dolar_value')->defaultValue(0); // lo que llefa en pesos o descuento del dolar
            $table->float('dolar_oficial')->defaultValue(0)->nullable();
            $table->float('dolar_pagado')->defaultValue(0)->nullable();
            $table->float('iva')->defaultValue(0.0)->nullable();
            $table->string('status')->nullable()->defaultValue('Pendiente de Pago'); //eliminacion 
            $table->string('img_studio')->nullable();
            $table->string('img_payment')->nullable();
            $table->string('datax')->nullable()->defaultValue('[]');
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->foreign('studio_id')->references('id')->on('estudios');
            $table->unsignedInteger('contable_id')->nullable();
            $table->foreign('contable_id')->references('id')->on('contables');
            $table->unsignedInteger('moneda_id');
            $table->foreign('moneda_id')->references('id')->on('monedas');
            $table->unsignedInteger('monetizador_id');
            $table->foreign('monetizador_id')->references('id')->on('monetizadores')->nullable();
            $table->unsignedBigInteger('paystudio_id');
            $table->foreign('paystudio_id')->references('id')->on('paystudios');
           
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
        Schema::dropIfExists('invoicepaystudios');
    }
};
