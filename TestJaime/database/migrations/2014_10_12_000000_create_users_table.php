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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('dictionary', function (Blueprint $table) {
            $table->id();
            $table->string('province');
            $table->string('neighborhood');
            $table->string('city');
            $table->string('name');
            $table->string('number');
            $table->string('type');
            $table->string('charge');
            $table->timestamps();
        });

        Schema::create('searches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('percent');
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('dictionary');

    }
};
