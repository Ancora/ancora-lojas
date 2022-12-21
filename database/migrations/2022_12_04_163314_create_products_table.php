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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('shop_id');

            $table->integer('code');
            $table->string('name');
            $table->boolean('status')->default(true);
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->decimal('width', 8, 2);
            $table->decimal('height', 8, 2);
            $table->decimal('length', 8, 2);
            $table->string('slug');

            $table->timestamps();
            $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
