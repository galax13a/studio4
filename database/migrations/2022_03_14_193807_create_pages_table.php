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
        Schema::create('pages', function (Blueprint $table) {

            $table->bigIncrements("id");
            $table->string('name')->index();
            $table->string("master_account",100)->default(0);
            $table->string('monedax')->nullable()->defaultValue('tokens');
            $table->float('value')->default(0.05);
            $table->string('link')->nullable();
            $table->boolean('status',1)->default(1);
            $table->unsignedBigInteger('studio_id')->nullable();
            $table->foreign('studio_id')->references('id')->on('estudios');
            $table->unsignedBigInteger('pagemaster_id')->nullable();
            $table->foreign('pagemaster_id')->references('id')->on('pagemasters');
            $table->unsignedInteger('moneda_id');
            $table->foreign('moneda_id')->references('id')->on('monedas');
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
        Schema::dropIfExists('pages');
    }
};
