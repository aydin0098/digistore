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
        Schema::connection('mysql_products')->create('attributes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('isFilter')->default(0);
            $table->boolean('isActive')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::connection('mysql_products')->create('attribute_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attributes')->cascadeOnDelete();
            $table->string('value');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::connection('mysql_products')->create('attribute_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attributes')->cascadeOnDelete();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete();
            $table->unsignedBigInteger('value_id');
            $table->foreign('value_id')->references('id')->on('attribute_values')->cascadeOnDelete();
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
        Schema::connection('mysql_products')->dropIfExists('attribute_product');
        Schema::connection('mysql_products')->dropIfExists('attribute_values');
        Schema::connection('mysql_products')->dropIfExists('attributes');
    }
};
