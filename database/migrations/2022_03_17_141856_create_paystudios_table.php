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
        Schema::create('paystudios', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->date("date")->nullable();
            $table->date("date_ini")->nullable();
            $table->date("date_finish")->nullable();
            $table->double("payout")->default(0);
            $table->boolean("status")->default(0);
            $table->string("program")->nullable();
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->foreign('studio_id')->references('id')->on('estudios');
            $table->unsignedBigInteger('page_id')->nullable();
            $table->foreign('page_id')->references('id')->on('pages');
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
        Schema::dropIfExists('paystudios');
    }
};
