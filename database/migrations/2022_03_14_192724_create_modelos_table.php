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
        Schema::create('modelos', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('name')->index();
            $table->string('nick')->nullable();
            $table->string('nick2')->nullable();
            $table->string('email')->nullable();
            $table->string('dni')->nullable();
            $table->string('wsp')->nullable();
            $table->double('porce')->defaultValue(50);
            $table->string('typomodel',50)->defaultValue("Studio");
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->boolean('status')->defaultValue(1);
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->foreign('studio_id')->references('id')->on('estudios');
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
        Schema::dropIfExists('modelos');
    }
};
