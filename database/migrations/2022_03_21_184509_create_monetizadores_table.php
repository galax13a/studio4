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
        Schema::create('monetizadores', function (Blueprint $table) {
            $table->integerIncrements("id");   
            $table->string('name')->index();
            $table->string('pagina')->nullable();
            $table->string('contact')->nullable();
            $table->string('email')->nullable();
            $table->float('porce')->default(5);
            $table->boolean('status')->nullable()->default(false);
            $table->string('datax')->nullable(); 
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
        Schema::dropIfExists('monetizadores');
    }
};
