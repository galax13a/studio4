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
        Schema::create('contablestudios', function (Blueprint $table) {
            $table->integerIncrements("id");   
            $table->string('name')->index();
            $table->float('value')->defaultValue(0);
            $table->boolean('status')->nullable()->defaultValue(true); //eliminacion 
            $table->float('codesubmaster')->defaultValue(1.1);
            $table->string('datax')->nullable()->defaultValue('[]');
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->foreign('studio_id')->references('id')->on('estudios');
            $table->unsignedInteger('contable_id')->nullable();
            $table->foreign('contable_id')->references('id')->on('contables');
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
        Schema::dropIfExists('contablestudios');
    }
};
