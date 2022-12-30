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
        Schema::create('color_element', function (Blueprint $table) {
            $table->unsignedInteger('color_id');
            $table->unsignedInteger('element_id');

            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('element_id')->references('id')->on('elements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_element');
    }
};
