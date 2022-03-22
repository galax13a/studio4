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
        Schema::create('dolars', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->float('trm')->default(0)->nullable();
            $table->string('trm2',10)->default(0)->nullable();
            $table->date('date')->nullable()->index()->unique();
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
        Schema::dropIfExists('dolars');
    }
};
