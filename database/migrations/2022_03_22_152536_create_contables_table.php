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
        Schema::create('contables', function (Blueprint $table) {
            $table->integerIncrements("id");   
            $table->string('name')->index();
            $table->float('value')->defaultValue(0);
            $table->boolean('status')->nullable()->defaultValue(true); //eliminacion 
            $table->float('codemaster')->defaultValue(1);
            $table->string('datax')->nullable()->defaultValue('[]');
            $table->unsignedBigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresas');
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
        Schema::dropIfExists('contables');
    }
};
