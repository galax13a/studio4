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
        Schema::create('paymedios', function (Blueprint $table) {
            $table->integerIncrements("id");   
            $table->string('name')->index();
            $table->string('data1')->nullable()->defaultValue('[]');
            $table->string('data2')->nullable()->defaultValue('[]');
            $table->string('datax')->nullable()->defaultValue('[]');
           // $table->unsignedBigInteger('studio_id')->nullable();
            //$table->foreign('studio_id')->references('id')->on('estudios');
            $table->unsignedInteger('moneda_id');
            $table->foreign('moneda_id')->references('id')->on('monedas');
            $table->boolean('status')->nullable()->defaultValue(false);
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
        Schema::dropIfExists('paymedios');
    }
};
