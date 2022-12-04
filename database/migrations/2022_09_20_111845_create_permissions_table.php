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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('permission_user', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->foreign('permission_id')->references('id')->on('digistore.permissions')->cascadeOnDelete();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('digistore.users')->cascadeOnDelete();
        });
        Schema::create('role_user', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('digistore.roles')->cascadeOnDelete();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('digistore.users')->cascadeOnDelete();
        });
        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->foreign('permission_id')->references('id')->on('digistore.permissions')->cascadeOnDelete();
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('digistore.roles')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('permission_user');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
    }
};
