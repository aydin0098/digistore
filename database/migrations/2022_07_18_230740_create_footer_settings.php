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
        Schema::connection('mysql_settings')->create('footers', function (Blueprint $table) {
            $table->id();
            $table->string('upLabel')->nullable();

            $table->string('widgetLabel1')->nullable();
            $table->string('widgetLabel2')->nullable();
            $table->string('widgetLabel3')->nullable();
            $table->string('widgetLabel4')->nullable();
            $table->string('widgetLabel5')->nullable();

            $table->string('rssLabel')->nullable();
            $table->string('socialLabel')->nullable();
            $table->string('supportLabel')->nullable();
            $table->string('phoneLabel')->nullable();
            $table->string('emailLabel')->nullable();

            $table->string('aboutHeadLabel')->nullable();
            $table->text('aboutbodyLabel')->nullable();

            $table->text('copyright')->nullable();
            $table->timestamps();

            //Socials
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            $table->string('socialIcon1')->nullable();
            $table->string('socialLink1')->nullable();
            $table->string('socialIcon2')->nullable();
            $table->string('socialLink2')->nullable();
            $table->string('socialIcon3')->nullable();
            $table->string('socialLink3')->nullable();
            $table->string('socialIcon4')->nullable();
            $table->string('socialLink4')->nullable();
            $table->string('socialIcon5')->nullable();
            $table->string('socialLink5')->nullable();
            $table->string('socialLink6')->nullable();
            $table->string('socialIcon6')->nullable();
            $table->string('socialLink7')->nullable();
            $table->string('socialIcon7')->nullable();
            $table->string('socialLink8')->nullable();
            $table->string('socialIcon8')->nullable();
            $table->string('socialLink9')->nullable();
            $table->string('socialIcon9')->nullable();

            $table->string('enamad')->nullable();
            $table->string('linkApp1')->nullable();
            $table->string('imageApp1')->nullable();
            $table->string('linkApp2')->nullable();
            $table->string('imageApp2')->nullable();

        });

        //Footer Logos
        Schema::connection('mysql_settings')->create('footer_logos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('image');
            $table->string('url')->nullable();
            $table->enum('type',['top','bottom']);
            $table->integer('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        //Footer Menus
        Schema::connection('mysql_settings')->create('footer_menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url')->nullable();
            $table->enum('type',['widgetLabel1','widgetLabel2','widgetLabel3']);
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
        Schema::connection('mysql_settings')->dropIfExists('footer_menus');
        Schema::connection('mysql_settings')->dropIfExists('footer_logos');
        Schema::connection('mysql_settings')->dropIfExists('footers');
    }
};
