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
        Schema::create('trafic1s', function (Blueprint $table) {
            $table->bigIncrements("id");   
            $table->string("url");
            $table->string("pagui")->nullable();
            $table->string("datax")->nullable();
            $table->boolean("status")->default(0)->nullable();
            $table->integer("page_id")->default(1)->nullable();
            $table->string("tiposala")->nullable()->nullable;

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
        Schema::dropIfExists('trafic1s');
    }
};
