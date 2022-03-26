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
        Schema::create('paystudios', function (Blueprint $table) { /// funciona como statstudios controllador
            $table->bigIncrements("id");
            $table->date("date")->nullable();
            $table->string('num')->nullable()->defaultValue('******');
            $table->string('data1')->nullable()->defaultValue('******');
            $table->string('data2')->nullable()->defaultValue('******');
            $table->date("date_ini")->nullable();
            $table->date("date_finish")->nullable();
            $table->double("payout")->default(0);
            $table->boolean("status")->default(0);
            $table->string("program")->nullable();
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->foreign('studio_id')->references('id')->on('estudios');
            $table->unsignedBigInteger('page_id');
            $table->foreign('page_id')->references('id')->on('pages')->nullable();
            $table->unsignedInteger('medio_id');
            $table->foreign('medio_id')->references('id')->on('paymediosdetails')->nullable();
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
