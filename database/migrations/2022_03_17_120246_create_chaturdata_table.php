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
        Schema::create('chaturdatas', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("name",80)->default(0)->nullable();
            $table->string("link")->default(0);
            $table->boolean("type")->default(0); // si es cero es studio si no modelo
            $table->boolean("status")->nullable()->default(true);
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->foreign('studio_id')->references('id')->on('estudios');
            $table->unsignedBigInteger('pagemaster_id')->nullable();
            $table->foreign('pagemaster_id')->references('id')->on('pagemasters');
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
        Schema::dropIfExists('chaturdata');
    }
};
