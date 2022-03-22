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
        Schema::create('prizes', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string('name');
            $table->text('description')->nullable();
            $table->date("date")->nullable();
            $table->date("date2")->nullable();
            $table->double("value")->default(0);
            $table->boolean("status")->default(0);
            $table->string("img")->nullable();
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
        Schema::dropIfExists('prizes');
    }
};
