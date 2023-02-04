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
        Schema::connection('mysql_products')->create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('value');
            $table->boolean('isActive')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::connection('mysql_products')->create('warranties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('value');
            $table->boolean('isActive')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::connection('mysql_products')->create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->boolean('isActive')->default(1);
            $table->timestamps();
        });

        Schema::connection('mysql_products')->create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        Schema::connection('mysql_products')->create('products', function (Blueprint $table) {
            $table->id();
            $table->longText('title');

            $table->unsignedBigInteger('level1_id');
            $table->foreign('level1_id')->references('id')->on('digistore_products.categories');
            $table->unsignedBigInteger('level2_id');
            $table->foreign('level2_id')->references('id')->on('digistore_products.categories');
            $table->unsignedBigInteger('level3_id');
            $table->foreign('level3_id')->references('id')->on('digistore_products.categories');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('digistore_products.brands');

            $table->unsignedBigInteger('warranty_id');
            $table->foreign('warranty_id')->references('id')->on('digistore_products.warranties');

            $table->string('description');
            $table->text('body');

            $table->integer('price');
            $table->integer('discount_price')->nullable();

            $table->string('count')->default(0);
            $table->integer('weight')->nullable();
            $table->string('viewCount')->default(0);
            $table->string('digiclub')->default(0);
            $table->integer('orderMin')->default(0);
            $table->integer('orderMax')->default(0);
            $table->boolean('special')->default(0);
            $table->boolean('isActive')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::connection('mysql_products')->create('product_tag', function (Blueprint $table) {

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('digistore_products.products');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('digistore_products.tags');
            $table->primary(['tag_id','product_id']);

        });
        Schema::connection('mysql_products')->create('color_product', function (Blueprint $table) {

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('digistore_products.products');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('digistore_products.colors');
            $table->primary(['color_id','product_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mysql_products')->dropIfExists('warranty_product');
        Schema::connection('mysql_products')->dropIfExists('color_product');
        Schema::connection('mysql_products')->dropIfExists('product_tag');
        Schema::connection('mysql_products')->dropIfExists('products');
        Schema::connection('mysql_products')->dropIfExists('brands');
        Schema::connection('mysql_products')->dropIfExists('tags');
        Schema::connection('mysql_products')->dropIfExists('warranties');
        Schema::connection('mysql_products')->dropIfExists('colors');

    }
};
